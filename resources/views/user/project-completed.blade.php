@extends('layouts.user')
@section('style')
<link rel="stylesheet" href="{{asset('styles/project-1-page.css')}}"/>
<style>
    .projectBg {
        background: #fff;
    }
    .projectBg {width: 89.1%;margin: 50px  auto;padding: 0;}

    ul.projectLists > li {background: #f0f0f0;padding: 7px 14px;margin-bottom: 15px;}

    .page-link {
  position: relative;
  display: block;
  padding: .5rem .75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #000;
  background-color: #fff;
  border: 1px solid #dee2e6;
}
.page-item.active .page-link {
  z-index: 1;
  color: #fff;
  background-color: #666;
  border-color: #666;
}

.pagination {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: .25rem;
}
</style>
@endsection
@section('content')

<div class="projectBg completedProject">
            <ul class="projectLists">
                  @forelse ($projects as $project)
                  <li>
                    <h3 class="toggleHandler" wire:click="$set('selected_project',)">
                        <span>{{$project->name}}<span class="arrow">❯</span></span>
                        @if ($project->assign_user != $user)
                        <span class="assign-user">Assign To : <strong>{{$project->assign_user->name??'Not Assign'}}</strong></span>
                        @endif
                        <span> 
                            {{convert_currency($project->budget)}}
                            </span>
                    </h3>
                    <div class="projectDetails toggleContent">

                        <ul>
                            @foreach ($project->rooms as $room)
                            <li>
                                <div class="title toggleHandler" wire:click="$set('selected_room',)">
                                    <span class="lable">{{$room->name}} <span class="arrow">❯</span>
                                    </span> <span> 
                                        {{convert_currency($room->budget)}}
                                        </span>
                                </div>
                                <div class="selectedProjects toggleContent">
                                    <ul class="center-images">
                                        @foreach ($room->products as $product)
                                        <li>
                                            <div class="desktop-image image-container">
                                                <div class="flex-box row">
                                                    <div class="col_6">
                                                        <img loading="lazy" src="{{$product->product->setColor($product->color_id)->closeup_image}}" alt="" class="" />
                                                    </div>
                                                    <div class="col_6">
                                                        <div class="productDetails">
                                                            <div class="flex-box">
                                                                <h2><a style="color:#333" href="http://tulio.design/product/{{$product->product->p_cd}}">{{$product->name}}</a>  </h2>
                                                                <div class="productOption">
                                                                    <span style="float:left;">
                                                                        <span class="colorcircle" style="background-color:#{{$product->color}};margin-right:10px"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="priceBox">
                                                                <span> 
                                                                    {{convert_currency($product->price)}}
                                                                    </span>
                                                            </div>

                                                            <div class="productInfo">
                                                                <p>Quantity - <span class="value">{{$product->quantity}}</span></p>
                                                                <p>Unit Dimensions <span class="value">{{$product->width}} X {{$product->length}} {{$product->unit}}</span></p>
                                                                <p>Lining Type - <span class="value">{{$product->lining_type}}</span></p>
                                                                <p>Hardware Type - <span class="value">{{$product->hardware_type}}</span></p>
                                                                @if ($product->hardware_type=='Motorized')
                                                                    <p>Power Type - <span class="value">{{$product->power_type}}</span></p>
                                                                    <p>Control Type - <span class="value">{{$product->control_type}}</span></p>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                  @empty
                      <h4>No data </h4>
                  @endforelse
                </ul>
                {{$projects->links()}}
        </div>
@endsection
@section('script')


<script>

     $(document).ready(function(){

        $('.toggleHandler').click(function(){
           $(this).toggleClass('active');
           $(this).next('.toggleContent').slideToggle();
       });


    });
</script>
@endsection
