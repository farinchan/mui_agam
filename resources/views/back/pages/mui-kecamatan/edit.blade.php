@extends('back.app')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('seo')

@endsection
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <h1 class="card-title">
                        MUI Kecamatan
                    </h1>
                </div>
                <form action="{{ route('admin.personalia.update', $personalia->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body p-10 p-lg-15">
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Nama Personalia Menu</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Menu"
                                value="{{ $personalia->name }}" name="name" />
                        </div>
                        <div id="kt_docs_ckeditor_document_toolbar"></div>
                        <div class="mb-10" id="kt_docs_ckeditor_document">
                            {!! $personalia->content !!}
                        </div>
                        <input type="hidden" name="content" id="content">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.personalia.index') }}" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('back/plugins/custom/ckeditor/ckeditor-document.bundle.js') }}"></script>

    <script>
        DecoupledEditor
            .create(document.querySelector('#kt_docs_ckeditor_document'),{
                ckfinder: {
                    uploadUrl: '{{ route('admin.personalia.upload') }}',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }
            })
            .then(editor => {
                const toolbarContainer = document.querySelector('#kt_docs_ckeditor_document_toolbar');
                toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                document.querySelector('#content').value = editor.getData();
                editor.model.document.on('change:data', () => {
                    const data = editor.getData();
                    document.querySelector('#content').value = data;
                });

                editor.plugins.get('FileRepository').on('uploadFailed', (evt, data) => {
                    console.log(evt);
                    console.log(data);
                    Alert.error('Upload failed : ' + data.message);
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
