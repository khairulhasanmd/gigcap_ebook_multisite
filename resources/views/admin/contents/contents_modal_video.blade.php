<div class="modal fade " id="add_edit_modal" tabindex="-1" aria-hidden="true" aria-labelledby="ModalTitle">
    <form class="form" action="{{url('/').'/'.Request::path()}}" enctype="multipart/form-data" id="add_edit_modal_form" data-kt-redirect="{{url('/').'/'.Request::path()}}" method="POST">
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?php (isset($detail)) ? '<input type="hidden" name="id" id="id" value="'.$detail->id.'' : '">'; ?>
                @csrf
                <div class="modal-header" id="add_edit_modal_header">
                    <h2 class="fw-bold" id="ModalTitle">{{ (isset($detail)) ? 'Edit' : 'Add' }} a {{ Str::plural($category->name, 1) }}</h2>

                    <div id="add_edit_modal_close" onclick="window.location.href='{{ url('/admin/contents/'.$category->slug) }}'" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"> <i class="ki-duotone ki-cross fs-1"> <span class="path1"></span> <span class="path2"></span> </i> </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="add_edit_modal_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_edit_modal_header" data-kt-scroll-wrappers="#add_edit_modal_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Title</label>
                            <input type="text" class="form-control form-control-solid @error('title') is-invalid @enderror" placeholder="This is a awesome {{ Str::plural($category->name, 1) }}" onkeyup="document.getElementById('slug').value=slugify(this.value);" name="title" value="{{ (isset($detail)) ? $detail->title : '' }}" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Slug</label>
                            <input type="text" class="form-control form-control-solid @error('slug') is-invalid @enderror" placeholder="some_awesome_url" name="slug" id="slug" value="{{ (isset($detail)) ? $detail->slug : '' }}" />
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if($category->tags->count())
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Tag</label>
                                <select class="form-control @error('tag_id') is-invalid @enderror" name="tag_id" id="tag_id">
                                    @foreach ($category->tags as $tag)
                                    <option value="{{ $tag->id }}" {!! (isset($detail)) ? (($tag->id == $detail->tag_id) ? "selected='selected'" : '') : '' !!} title="{{ $tag->name }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        @endif
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Preview Image/Thumbnail</label>
                            <input type="file" class="form-control form-control-solid @error('image') is-invalid @enderror" name="image" />
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Video URL</label>
                            <input type="text" class="form-control form-control-solid @error('video') is-invalid @enderror" name="video" value="{{ (isset($detail)) ? $detail->video : '' }}" />
                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Description</label>
                            <input type="text" class="form-control form-control-solid @error('description') is-invalid @enderror" placeholder="This is an awesome {{$category->slug}} description" name="description" value="{{ (isset($detail)) ? $detail->description : '' }}" />
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" onclick="window.location.href='{{ url('/admin/contents/'.$category->slug) }}'" >Discard</button>
                    <button type="submit" class="btn btn-primary"> <span class="indicator-label">Submit</span>  </button>
                </div>
            </div>
        </div>
    </form>
</div>
