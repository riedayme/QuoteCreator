<!-- Modal -->
<div class="modal fade" id="aboutmodal" tabindex="-1" aria-labelledby="aboutmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About App</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Name</td>
              <td>
                <?php echo $appinfo['name']; ?>
              </td>
            </tr>
            <tr>
              <td>Version</td>
              <td>
                <?php echo $appinfo['version']; ?>
              </td>
            </tr>
            <tr>
              <td>Creator</td>
              <td>
                <?php echo $appinfo['creator']; ?>
              </td>
            </tr>
             <tr>
              <td>Contact</td>
              <td>
                <a target="_blank" href="<?php echo $appinfo['contact']; ?>">Facebook</a>
              </td>
            </tr>
            <tr>
              <td class=" u-text-center" colspan="2">Build With</td>
            </tr>
            <tr>
              <td class="u-p-medium u-text-bold" colspan="2">
                <span class="badge mb-1 bg-info">Bootstrap 5</span>&nbsp;
                <span class="badge mb-1 bg-primary">PHP Native</span>
                 <span class="badge mb-1 bg-warning">PHPImage</span>
              </td>
            </tr>       
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>