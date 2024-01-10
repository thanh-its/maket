@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')


    <!-- Blog Section Begin -->
    <section class="blog ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                        <form name="fillter_pro" class="" action="{{ route('blogs') }}" method="get">
                        <input type="hidden" class="form-control bg-light border-0 small sreach" name="page" value="{{request('page') ? request('page') : '1' }}" aria-label="Search" aria-describedby="basic-addon2">
                        @if($categories_slug != "")
                                    <input type="hidden" name="Category_Blog" value="{{ $categories_slug->slug }}">
                                    @endif       
                        <input type="text" value="{{ request('search') }}" name="search" placeholder="Search...">
                                <button id="fillter_pro"  type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item categories1">
                            <h4>Danh mục bài viết</h4>
                            <ul>
                                @foreach($CategoryBlogs as $CategoryBlog)
                                <li class=" {{ !empty(request('Category_Blog')) && request('Category_Blog') == $CategoryBlog->slug ? 'active' :  ''  }} ">
                                    <a href="{{ route('blogs').'?Category_Blog='.$CategoryBlog->slug  }}">{{ $CategoryBlog->name }} ({{ $CategoryBlog->blogs->count() }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Bài viết liên quan</h4>
                            <div class="blog__sidebar__recent">
                            @foreach($RelatedCategorys->take(5) as $RelatedCategory)
                                <a href="{{ route('blog',['slug' => $RelatedCategory->slug_blog ]) }}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic " style=" width: 30%;">
                                        <img src="{{asset('storage/' .$RelatedCategory->image)}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$RelatedCategory->name_blog }}</h6>
                                        <span>{{ date_format($RelatedCategory->updated_at,"Y/m/d") }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{asset('storage/' .$Blog->image)}}" class="w-100" alt="">
                        <h3>{{$Blog->name_blog }}</h3>
                        <p><i> {{$Blog->short_description }}</i></p>
                        <p>{!! $Blog->description !!}</p>
        
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{asset('storage/' .$Blog->User->avatar)}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>{{ $Blog->User->fullname }}</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Loại bài viết:</span> {{ $Blog->CategoryBlog->name }}</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection

@section('javascript')

@endsection