<div class="modal fade" id="modal-create-section" tabindex="-1" role="dialog" aria-labelledby="modal-create-section" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание новой секции</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.create-section')}}" method="post" id="form-create-section" novalidate>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="section-name">Name</label>
                        <input type="text" class="form-control" name="name" id="section-name" placeholder="Name" value="{{old('name') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="create-section">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
