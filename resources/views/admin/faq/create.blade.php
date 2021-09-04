@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Create a FAQ
            </h3>
        </div>
        <!--begin::Form-->
        <form method="post" action="{{ route('faq.store') }}">
            @csrf
            @method("post")
            <div class="card-body">
                <div class="form-group col-lg-12">
                    <label>Question<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " placeholder="Question ?" name="question"
                        value="{{ old('question') ?? '' }}">
                </div>
                <div class="form-group col-lg-12">
                    <label>Question<span class="text-danger">*</span></label>
                    <div class="col-lg-12 p-0">
                        <textarea class="summernote" id="kt_summernote_1" name="response"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="h{{ route('faq.index') }}" class="btn btn-light-dark"><i
                                class="flaticon2-left-arrow-1"></i>Back</a>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2 col-3">Post the FAQ</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" rel="preload" as="script">
        var KTSummernoteDemo = function() {
            var demos = function() {
                $('.summernote').summernote({
                    height: 350
                });
            }
            return {
                init: function() {
                    demos();
                }
            };
        }();
        jQuery(document).ready(function() {
            KTSummernoteDemo.init();
        });
    </script>
@endsection
