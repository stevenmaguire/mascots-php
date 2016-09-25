<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogDatabaseActivity
{
    public function handle($request, Closure $next)
    {
        DB::enableQueryLog();

        return $next($request);
    }

    public function terminate($request, $response)
    {
        try {
            $queries = collect(DB::getQueryLog());

            if (Config::get('database.log', false)) {
                $queries->each(function ($query) {
                    // Format binding data for sql insertion
                    foreach ($query['bindings'] as $i => $binding) {
                        if ($binding instanceof \DateTime) {
                            $query['bindings'][$i] = $binding->format('\'Y-m-d H:i:s\'');
                        } elseif (is_string($binding)) {
                            $query['bindings'][$i] = "'$binding'";
                        }
                    }

                    // Insert bindings into query
                    $queryItem = str_replace(array('%', '?'), array('%%', '%s'), $query['query']);
                    $queryItem = vsprintf($queryItem, $query['bindings']);
                    Log::info($queryItem);
                });
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
        }

        return $response;
    }
}
