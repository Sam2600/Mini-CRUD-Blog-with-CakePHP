<div class="container col-md-8 offset-md-2 my-5">

     <?php
     $message = $this->Flash->render();

     if ($message) {
          echo '<div class="alert alert-success text-black text-center" role="alert">';
          echo $message;
          echo '</div>';
     }
     ?>

     <h2 class="mb-4">Main page for posts</h2>

     <?php

     ?>

     <table class="table table-bordered table-hover border border-primary">
          <thead>
               <tr>
                    <th scope="col">P ID</th>
                    <th scope="col">T ID</th>
                    <th scope="col">Titile</th>
                    <th scope="col">Paragraph</th>
                    <th scope="col">Created</th>
                    <th scope="col">Modified</th>
                    <th scope="col" class="text-center">Actions</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($posts as $post) : ?>
                    <tr>
                         <th scope="row"><?php echo $post['Post']['id'] ?></th>
                         <th scope="row"><?php echo $post['Post']['topic_id'] ?></th>
                         <td><?php echo $post['Topic']['title'] ?></td>
                         <td><?php echo $post['Post']['body'] ?></td>
                         <td><?php echo $post['Post']['created'] ?></td>
                         <td><?php echo $post['Post']['modified'] ?></td>
                         <td>
                              <button class="btn btn-secondary btn-sm">
                                   <?php echo $this->Html->link("View", ["controller" => "posts", "action" => "view", $post['Post']['id']], ["style" => "text-decoration:none; color:white"]) ?>
                              </button>

                              <button class="btn btn-info btn-sm">
                                   <?php echo $this->Html->link("Update", ["controller" => "posts", "action" => "update", $post['Post']['id']], ["style" => "text-decoration:none; color:white"]) ?>
                              </button>

                              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                   Delete
                              </button>


                              <!-- Modal -->
                              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Delete the post</b></h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                  <b>Are you sure you want to delete?</b>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger">
                                                       <?php
                                                       echo $this->Form->postLink(
                                                            'Delete',
                                                            array('action' => 'delete', $post['Post']['id']),
                                                            array("style" => "text-decoration:none; color:white"),
                                                       );
                                                       ?>
                                                  </button>
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                         </td>
                    </tr>
               <?php endforeach ?>
               <?php unset($topic); ?>
          </tbody>
     </table>
</div>