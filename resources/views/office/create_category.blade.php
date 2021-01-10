<div class="modal fade" id="modal-create-category" tabindex="-1" role="dialog" aria-labelledby="modal-create-category" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание новой категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.create-category')}}" method="post" id="form-create-category" novalidate>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="mr-sm-2" for="category-section">Section</label>
                        @php
                            $sections = \App\Models\Section::all();
                        @endphp
                        <select class="form-control form-control-lg" name="section" id="category-section">
                            @foreach($sections as $section)
                                <option value="{{$section->id}}" @if(!empty(old('section'))) @if(old('section') == $section->id) selected @endif @endif>{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category-name">Name</label>
                        <input type="text" class="form-control" name="name" id="category-name" placeholder="Name" value="{{old('name') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="create">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
