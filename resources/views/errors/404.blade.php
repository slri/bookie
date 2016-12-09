@extends("templates.default")

@section("content")
				<h2>{{ trans("errors.404.header") }}</h2>
				<p>{{ trans("errors.404.description") }}</p>
				<p style="color:#27a">{{ trans("errors.404.cta.message") }}<a href='{{ "mailto:" . trans("errors.404.cta.link") }}'>{{ trans("errors.404.cta.link") }}</a>, {{ trans("errors.404.cta.name") }}</p>
@stop