

 <script src="{{ asset('js/jquery.min.js') }}"></script> 
  <div class="modal in fade" id="modal-assign-pargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Available Pargonaughts</h5>
          
        </div>
        <div class="modal-body">
        <table id="assign-pargo" class="table table-striped">
            <?php foreach ($pargonaughts as $pargonaught): ?>
                <tr id="{{ $pargonaught->id }}" onclick="addRow('{{ $pargonaught->id }}', '{{ $pargonaught->name }}')">
                    <td>{{ $pargonaught->name }}</td>
                </tr>
            <?php endforeach; ?>
            </table>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<script>
var parcels = [];
<?php foreach ($parcels as $parcel): ?>
  parcels.push({id: <?php echo $parcel->id; ?>, name: '<?php echo $parcel->name; ?>'});
<?php endforeach; ?>
$('#assign-pargo').modal('hide');

function addPargonaught(index){
    $('#modal-assign-pargo').modal('show');
}

function addRow(id, name){
  if(getParcel()){
    var parcel = getParcel();
    $('#assign-pargo-add').append("<tr id='add_pargo_'" + id + "><td>" + name + "</td><td>" + parcel + "</td></tr>");
  } 
}

function getParcel(){
  if(parcels.length > 0){
    const sel_par = parcels[0];
    parcels.shift()
    return sel_par.name;
  }
  return ''; 
}

</script>