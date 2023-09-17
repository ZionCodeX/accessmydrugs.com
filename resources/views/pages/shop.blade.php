
@extends('layouts.base_shop')


@section('title', 'Shop')


<!-- MAIN PAGE CONTENT STARTS -->
@section('content')

        <!---------------------------------------------------------->
    
        @include('components/inc_main_slide_banner_section_shop')

        @include('components/inc_category1_section_shop')

        @include('components/inc_category2_section_shop')

        @include('components/inc_category3_section_shop')

        @include('components/inc_brand_section_shop')

        <!---------------------------------------------------------->

@endsection 
<!-- MAIN PAGE CONTENT STOPS -->


