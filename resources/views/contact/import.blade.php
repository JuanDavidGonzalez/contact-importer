<form action="{{route('contact.import')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-md-10">
            <label for="contactFile">Import Contacts</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('contactFile') is-invalid @enderror" id="contactFile" name="contactFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
            @error('contactFile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-2 text-right mt-auto">
            <button class="btn btn-primary"><i class="fa fa-upload"></i> Import Contacts</button>
        </div>
    </div>
</form>
