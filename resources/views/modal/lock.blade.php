 <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="passwordModalLabel">Enter Password</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form id="passwordForm">
                     <div class="mb-3">
                         <label for="passwordInput" class="form-label">Password</label>
                         <input type="password" class="form-control" id="passwordInput"
                             placeholder="Enter your password">
                     </div>
                     <div id="passwordError" class="alert alert-danger d-none" role="alert">
                         Password salah. Silakan coba lagi.
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="submitPassword">Submit</button>
             </div>
         </div>
     </div>
 </div>
