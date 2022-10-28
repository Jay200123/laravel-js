@include('layouts.base')
<div id="items" class="container">
     <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#itemModal"  >add<span  class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
  <div  class="table-responsive">
    <table id="itable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>item ID</th>
          <th>Title</th>
          <th>Image</th>
          <th>description</th>
          <th>sell price</th>
          <th>cost price</th>
          <th>Action</th>
          </tr>
      </thead>
      <tbody id="ibody">
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="itemModal" role="dialog" style="display:none">
  <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create new item</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <form id="iform" method="#" action="#" enctype="multipart/form-data">

             <div class="form-group">
                  <label for="desc" class="control-label">Description</label>
                  <input type="text" class="form-control" id="description" name="description"  >
             </div>

             <div class="form-group">
                  <label for="desc" class="control-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title"  >
             </div>

             <div class="form-group"> 
                <label for="sell" class="control-label">sell price</label>
                <input type="text" class="form-control " id="sell_price" name="sell_price">
              </div>
              <div class="form-group"> 
                <label for="cost" class="control-label">Cost Price</label>
                <input type="text" class="form-control " id="cost_price" name="cost_price" >
              </div>
              <div class="form-group"> 
                <label for="image" class="control-label">Image</label>
                <input type="file" class="form-control" id="uploads" name="uploads" />
               </div>
            </form>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="itemSubmit" type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="editItemModal" role="dialog" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form id="iform" method ="PUT" action="#" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="eitem_id" class="control-label">Item id</label>
                    <input type="text" class="form-control" id="eitem_id" name="item_id"  readonly>
                </div>
                <div class="form-group">
                    <label for="eedescription" class="control-label">Description</label>
                    <input type="text" class="form-control" id="edescription" name="description" >
                </div>
                
                <div class="form-group">
                    <label for="eecost_price" class="control-label"><i class="#"></i> Cost Price</label>
                    <input type="text" class="form-control" id="ecost_price" name="cost_price">
                </div>
                
                <div class="form-group">
                    <label for="eesell_price" class="control-label"><i class="#"></i> Sell Price</label>
                    <input type="text" class="form-control " id="esell_price" name="sell_price" >
                </div>
            
                <div class="form-group">
                    <label for="eetitle" class="control-label"><i class="#"></i> Title</label>
                    <input type="text" class="form-control " id="etitle" name="title" >
                </div>
            
                <div class="form-group"> 
                    
                    <label for="eimagePath" class="control-label"><i class="#"></i>  Image</label>
                    <input type="file" class="form-control" id="eimagePath" name="eimagePath" >
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Close</button>
            <button id="itemUpdate" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
    </div>
</div>
</div>
