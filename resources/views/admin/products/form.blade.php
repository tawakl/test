@php
    $attributes=['class'=>'form-control','label'=>trans('products.title'),'placeholder'=>trans('products.title')];
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
                'label'=>trans('products.description'),
                'placeholder'=>trans('products.description'),
                ]
            ])

    </div>
    @include('form.select',[
        'name'=>'category_id',
        'options'=>$row->getCategories(),
        'attributes'=>[
            'class'=>'form-control select2',
            'required'=>'required',
            'label'=>trans('products.categories'),
            ]
        ]
    )
@php
    $attributes=['class'=>'form-control','label'=>trans('products.quantity'),'placeholder'=>trans('products.quantity')];
@endphp
@include('form.input',['name'=>'quantity','type'=>'text','attributes'=>$attributes])

