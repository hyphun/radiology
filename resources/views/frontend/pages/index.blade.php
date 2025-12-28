@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description ?? Str::limit(strip_tags($page->content), 160))

@push('meta')
    @if($page->banner_image)
        <meta property="og:image" content="{{ $page->banner_image }}">
    @endif
    <link rel="canonical" href="{{ request()->url() }}">
@endpush

@section('content')
    {{-- Main page content --}}
@endsection

@push('scripts')
    {{-- Page-specific JS --}}
@endpush
