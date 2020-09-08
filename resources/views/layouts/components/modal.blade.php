@if(isset($form) && $form == 'true')
    {{--            This the Modal --}}
    <div class="modal fade" id="{{isset($divId) ? $divId:''}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel">{!! isset($title) ? $title : '' !!}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{isset($formAction) ? route($formAction) : ''}}" method="{{isset($formMethod)? $formMethod : ''}}"
                          id="{{isset($formId) ? $formId : ''}}" name="{{isset($formName) ? $formName : ''}}" class="{{isset($class) ? $class : ''}}"
                          enctype="{{isset($formHeader) ? $formHeader : ''}}" novalidate="">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="Enter title" value="">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   placeholder="Enter Description" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                    <input type="hidden" id="todo_id" name="todo_id" value="0">
                </div>
            </div>
        </div>
    </div>
@endif
