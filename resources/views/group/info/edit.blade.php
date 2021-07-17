@extends('template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        {{ Breadcrumbs::render('group.info.edit',$group,$base->index) }}
            <div class="card-body">
                <h3 class="text-center mb-4">{{$base->name}}の{{$base->getTemplate()->edit['name']}}</h3>

                @include('group.info.edit.'.$base->getTemplate()->id, ['info' => $info,'group'=>$group,'index'=>$index])

            </div>
        </div>
    </div>
</div>
@endsection