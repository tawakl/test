@php
    $attributes=['class'=>'form-control','label'=>trans('categories.title'),'placeholder'=>trans('categories.title')];
@endphp

@include('form.input',['name'=>'title','type'=>'text','attributes'=>$attributes])

    <div class="form-group">
            @include('form.input',[
            'name'=>'description',
            'value'=>$row->description,
            'type'=>'textarea',
            'attributes'=>[
                'class'=>'form-control',
                'id'=>'summary-ckeditor',
                'label'=>trans('categories.description'),
                'placeholder'=>trans('categories.description'),
                ]
            ])

    </div>
