@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>ပေါက်တက်ကရ မေးမယ်</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">ပေါက်တက်ကရ မေးထားတဲ့မေးခွန်းပေါင်းစုံ</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @include('questions._form', ['buttonText' => "မသိဖူးကွာ မေးမယ်"])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
