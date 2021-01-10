<div class="modal fade" id="modal-create-brand" tabindex="-1" role="dialog" aria-labelledby="modal-create-brand" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание нового бренда</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" novalidate enctype="multipart/form-data" id="form-create-brand">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="brand-name">Name</label>
                        <input type="text" class="form-control" name="name" id="brand-name" placeholder="Name" value="{{old('name') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="brand-logotype">Logotype</label>
                        <input type="file" class="form-control-file" name="logotype" id="brand-logotype">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="create-brand">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
