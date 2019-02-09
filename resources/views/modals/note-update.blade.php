<div class="modal fade" id="reservation_cancel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Update Note</h4>                   
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                  予約キャンセルしますか？                     
                </div>    

                <form method="DELETE" enctype="multipart/form-data" v-on:submit.prevent="confirmCancel(reserveList.id)">
                      <button type="button" class="btn btn-danger" @click.prevent="confirmCancel(reserveList.id)">はい</button>
                      <button type="button" class="btn btn-success" id="cancel">いいえ</button>                  
                </form>  
            </div>
            <!-- <div class="modal-footer"> -->
                                    
            <!-- </div> -->
        </div>
    </div>
</div>