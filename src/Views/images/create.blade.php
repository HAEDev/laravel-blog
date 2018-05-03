@extends(config("laravel-blog.view_layout", "laravel-blog::layout"))

@section(config("laravel-blog.view_content", "content"))

    <div class="row">

        <div class="col-sm-12">

            <h3>Upload Images</h3>

            <form action="{{ blogUrl("images") }}" method="post" id="image-upload-form" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if(Request::input("embed", false))
                    <input type="hidden" name="embed" value="true" />
                @endif
                @if(Request::input("featured", false))
                    <input type="hidden" name="featured" value="true" />
                @endif

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="drag-upload">
                                <label for="images">
                                    <span class="no-drag">Select Images</span>
                                    <span class="drag">Click here, or drag images here to upload</span>
                                </label>
                                <input type="file" class="form-control" name="images[]" id="images"
                                       multiple onchange="previewFiles()" accept=".jpg,.jpeg,.png,.gif" required />
                            </div>
                        </div>
                    </div> <!-- End .col-sm-6 -->
                </div> <!-- End .row -->

                <h4>Selected Images</h4>
                <div class="row pending-images"></div>

                <div class="text-right">
                    <button class="btn btn-success">Upload</button>
                </div>

            </form>

        </div> <!-- End .col-sm-12 -->

    </div> <!-- End .row -->

@endsection