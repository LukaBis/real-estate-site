<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $validator = Validator::make(
          [
            'locale' => $request->segment(1)
          ],
          [
            'locale' => [
              Rule::in(config('translatable.locales'))
            ]
          ]
        );

        if ($validator->fails()) {
            return redirect('/'.config('translatable.locales')[0]);
        }

        app()->setLocale($request->segment(1));
        return $next($request);
    }
}
