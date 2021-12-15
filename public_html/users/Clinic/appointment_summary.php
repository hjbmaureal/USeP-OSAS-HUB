 <div class="modal fade" id="exampleModalLong<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">APPOINTMENT SUMMARY</h5>
                      </div>
                      <div class="modal-body c">
                        <div class="container" style="border: 2px solid black; border-radius: 10px;">
                  <form>  

                        <div class="table-responsive marg">
                            <table  class="table table-bordered table-hover">
                               <br>
                                <tbody>
                                    <tr>
                                        <th>Patient ID </th>
                                        <td><?php echo htmlentities($row['patient_id']);?></td>
                                    </tr>
                                    <tr>
                                        <th>Patient Name </th>
                                        <td><?php echo htmlentities($row['name']);?></td>
                                    </tr>
                                    <tr>
                                        <th>Type of Consultation </th>
                                        <td><?php echo htmlentities($row['consultation_type']);?></td>
                                    </tr>

                                     <tr>
                                        <th>Mode of Communication(1st Option) </th>
                                        <td><?php echo htmlentities($row['communication_mode_first_option']);?></td>
                                    </tr>
                                    <tr>
                                     <tr>
                                        <th>Mode of Communication(2nd Option) </th>
                                        <td><?php echo htmlentities($row['communication_mode_second_option']);?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number </th>
                                        <td><?php echo htmlentities($row['phone_number']);?></td>
                                    </tr>
                                    <tr>
                                        <th>Email </th>
                                        <td><?php echo htmlentities($row['email_add']);?></td>
                                    </tr>

                                     <tr>
                                        <th>Date </th>
                                        <td><?php echo htmlentities($row['appointment_date']);?></td>
                                    </tr>
                                    <tr>
                                        <th>Time </th>
                                        <td><?php echo htmlentities($row['time']);?></td>
                                    </tr>

                                    <tr>
                                        <th>Active Facebook account (if any)</th>
                                        <td><?php echo htmlentities($row['messenger'] ?? null);?></td>
                                    </tr>
                                    <tr>
                                        <th>Meeting link
                                        </th>
                                        <td><?php echo htmlentities($row['appointment_meetinglink']);?></td>
                                    </tr>

                                     
                            </tbody>
                          </table>
                          <br>
                            <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       </div>
                       </div>
                       </form>
                       </div>
                       </div>
                       </div>
                       </div>
                       </div>
                       
                        