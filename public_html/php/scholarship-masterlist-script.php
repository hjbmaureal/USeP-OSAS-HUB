<?php
  //this script contains the CRUD for the masterlist pages
  include_once("connect_db.php");
  $results = array();
  //set default time zone (Philippines)
  date_default_timezone_set('Etc/GMT-8');
  //for records
  //create
  if(isset($_POST['add-masterlist-record'])){
    $date = date('Y-m-d');
    $recordTitle = $_POST['addRecordTitle'];
    $recordType = $_POST['addRecordType'];
    $recordMode = $_POST['addRecordMode'];
    $recordCustodian = $_POST['addRecordCustodian'];
    $recordLocation = $_POST['addRecordLocation'];
    $recordRetentionActive = date('Y-m-d', strtotime($_POST['addRecordRetentionActive']));
    $recordRetentionArchive = date('Y-m-d', strtotime($_POST['addRecordRetentionArchive']));
    $recordDispositionYear = date('Y-m-d', strtotime($_POST['addRecordDispositionYear']));
    $recordDispositionMethod = $_POST['addRecordDispositionMethod'];
  
    $fileName = PATHINFO($_FILES['recordSoftCopy']['name']);
    $fileTmpName = $_FILES['recordSoftCopy']['tmp_name'];
    $ext = $fileName['extension'];
    //array for allowed file type
    $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');
    //check for allowed file type
    if(in_array($ext, $allowed)){
      //put future file size restrictions
      // if(filesize condition){}
      $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
      $fileLocation = '../scholarship-files/masterlist-records/'.$newFileName;
      move_uploaded_file($fileTmpName, $fileLocation);
    }else{
      die(header("Location: ../users/Scholarship/masterlist-records.php?type=invalid"));
    }
    $stmt = $conn->prepare("call addMasterlistRecord(?,?,?,?,?,?,?,?,?,?,?)");
    if(false===$stmt){
      die('prepare() failed: '.htmlspecialchars($conn->error));
    }
    $check = $stmt->bind_param("sssssssssss", $date, $recordTitle, $recordType, $recordMode, $recordCustodian, $recordLocation, $recordRetentionActive,$recordRetentionArchive, $recordDispositionYear,$recordDispositionMethod,$fileLocation);
    if(false === $check){
      die('bind_param() failed: '.htmlspecialchars($conn->error));
    }
    $stmt->execute();
    die(header("Location: ../users/Scholarship/masterlist-records.php?operation=success"));
  }
  //read
  if(isset($_POST['fetch_record'])){
    $record_no = $_POST['fetch_record'];

    $result = mysqli_query($conn, "SELECT * FROM scholarship_masterlist_record WHERE no = $record_no");
    while($row = mysqli_fetch_array($result)){
      $results[0] = $row['records_title'];
      $results[1] = $row['type_of_records'];
      $results[2] = $row['mode_of_filing'];
      $results[3] = $row['custodian'];
      $results[4] = $row['location'];
      $results[5] = $row['retention_active'];
      $results[6] = $row['retention_archive'];
      $results[7] = $row['disposition_year'];
      $results[8] = $row['disposition_method'];
      $results[9] = $row['no'];
    }
    die(json_encode($results));
  }
  //update
  if(isset($_POST['update-masterlist-record'])){
    $date = date('Y-m-d');
    $title = $_POST['updateRecordTitle'];
    $type = $_POST['updateRecordType'];
    $mode = $_POST['updateRecordMode'];
    $custodian = $_POST['updateRecordCustodian'];
    $location = $_POST['updateRecordLocation'];
    $retention_active = $_POST['updateRecordRetentionActive'];
    $retention_archive = $_POST['updateRecordRetentionArchive'];
    $disposition_year = $_POST['updateRecordDispositionYear'];
    $diposition_method = $_POST['updateRecordDispositionMethod'];
    $record_no = $_POST['recordNumber'];
    
    
    $fileName = PATHINFO($_FILES['updateRecordSoftCopy']['name']);
    $fileTmpName = $_FILES['updateRecordSoftCopy']['tmp_name'];
    
    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_record WHERE no = $record_no");
    $row = mysqli_fetch_array($result);
    $fileLocation = $row['file_location'];
    
    //if there is new file uploaded
    if($_FILES['updateRecordSoftCopy']['size'] != 0){
      unlink($fileLocation);
      //get file
      $ext = $fileName['extension'];
      //array for allowed file type
      $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');
      // check for allowed file type
      if(in_array($ext, $allowed)){
        //put future file size restrictions
        // if(filesize condition){}
      $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
        $newFileLocation = '../scholarship-files/masterlist-records/'.$newFileName;
        move_uploaded_file($fileTmpName, $newFileLocation);
      }else{
        die(header("Location: ../users/Scholarship/masterlist-records.php?type=invalid"));
      }
      mysqli_query($conn, "UPDATE scholarship_masterlist_record set date = '$date', records_title = '$title', type_of_records = $type, mode_of_filing = '$mode', custodian = '$custodian', location = '$location', retention_active = '$retention_active', retention_archive = '$retention_archive', disposition_year = '$disposition_year', disposition_method = '$diposition_method', file_location = '$newFileLocation' WHERE no = $record_no") or die(mysqli_error($conn));
      die(header("Location: ../users/Scholarship/masterlist-records.php?update=success"));
    }else{
      mysqli_query($conn, "UPDATE scholarship_masterlist_record set date = '$date', records_title = '$title', type_of_records = $type, mode_of_filing = '$mode', custodian = '$custodian', location = '$location', retention_active = '$retention_active', retention_archive = '$retention_archive', disposition_year = '$disposition_year', disposition_method = '$diposition_method' WHERE no = $record_no");
      die(header("Location: ../users/Scholarship/masterlist-records.php?update=success"));
    }
  }
  //delete
  if(isset($_POST['delete-masterlist-record'])){
    $record_no = $_POST['recordNumber'];

    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_record WHERE no = $record_no");

    $row = mysqli_fetch_array($result);

    $fileLocation = $row['file_location'];

    //remove file and then delete it in the database
    if(unlink($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_record WHERE no = $record_no");
    }
    //if the file has been deleted through directory and not system, record still exists in the db. This is to still delete it.
    if(!file_exists($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_record WHERE no = $record_no");
    }
    die(header("Location: ../users/Scholarship/masterlist-records.php?delete=success"));
  }

  //for documents
  //create
  if(isset($_POST['add-masterlist-document'])){
    $date = date('Y-m-d');
    $documentTitle = $_POST['addDocumentTitle'];
    $documentNumber = $_POST['addDocumentNumber'];
    $documentPrevDate = date('Y-m-d', strtotime($_POST['addDocumentPrevDate']));
    $documentRevNumberPrev = $_POST['addDocumentRevNumberPrev'];
    $documentLatestDate = date('Y-m-d', strtotime($_POST['addDocumentLatestDate']));
    $documentRevNumberLatest = $_POST['addDocumentRevNumberLatest'];
    
    $fileName = PATHINFO($_FILES['documentSoftCopy']['name']);
    $fileTmpName = $_FILES['documentSoftCopy']['tmp_name'];
    $ext = $fileName['extension'];
    echo $ext;
    //array for allowed file type
    $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');
    //check for allowed file type
    if(in_array($ext, $allowed)){
      //put future file size restrictions
      // if(filesize condition){}
      $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
      $fileLocation = '../scholarship-files/masterlist-documents/'.$newFileName;
      move_uploaded_file($fileTmpName, $fileLocation);
    }else{
      die(header("Location: ../users/Scholarship/masterlist-documents.php?type=invalid"));
    }
  
    $stmt = $conn->prepare("call addMasterlistDocument(?,?,?,?,?,?,?,?)");
    if(false===$stmt){
      die('prepare() failed: '.htmlspecialchars($conn->error));
    }
    $check = $stmt->bind_param("ssssssss", $date, $documentTitle, $documentNumber, $documentPrevDate, $documentRevNumberPrev, $documentLatestDate, $documentRevNumberLatest, $fileLocation);
    if(false === $check){
      die('bind_param() failed: '.htmlspecialchars($conn->error));
    }
    $stmt->execute();
    die(header("Location: ../users/Scholarship/masterlist-documents.php?operation=success"));
  }
  //read
  if(isset($_POST['fetch_document'])){
    $record_no = $_POST['fetch_document'];

    $result = mysqli_query($conn, "SELECT * FROM scholarship_masterlist_documents WHERE no = $record_no");
    while($row = mysqli_fetch_array($result)){
      $results[0] = $row['title'];
      $results[1] = $row['number'];
      $results[2] = $row['prev_revision_date'];
      $results[3] = $row['prev_revision_number'];
      $results[4] = $row['latest_revision_date'];
      $results[5] = $row['latest_revision_number'];
      $results[6] = $row['no'];
    }
    die(json_encode($results));
  }
  //update
  if(isset($_POST['update-masterlist-document'])){
    $date = date('Y-m-d');
    $title = $_POST['updateDocumentTitle'];
    $number = $_POST['updateDocumentNumber'];
    $PrevDate = $_POST['updateDocumentPrevDate'];
    $RevNum = $_POST['updateDocumentRevNumber'];
    $latestDate = $_POST['updateDocumentLatestDate'];
    $latestRevNum = $_POST['updateDocumentRevNum'];
    $record_no = $_POST['record-no'];
    
    
    $fileName = PATHINFO($_FILES['updateDocumentSoftCopy']['name']);
    $fileTmpName = $_FILES['updateDocumentSoftCopy']['tmp_name'];
    
    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_documents WHERE no = $record_no");
    $row = mysqli_fetch_array($result);
    $fileLocation = $row['file_location'];
    
    //if there is new file uploaded
    if($_FILES['updateDocumentSoftCopy']['size'] != 0){
      unlink($fileLocation);
      //get file
      $ext = $fileName['extension'];
      //array for allowed file type
      $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');
      // check for allowed file type
      if(in_array($ext, $allowed)){
        //put future file size restrictions
        // if(filesize condition){}
        $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
        $newFileLocation = '../scholarship-files/masterlist-documents/'.$newFileName;
        move_uploaded_file($fileTmpName, $newFileLocation);
      }else{
        header("Location: ../users/Scholarship/masterlist-documents.php?type=invalid");
        die();
      }
      mysqli_query($conn, "UPDATE scholarship_masterlist_documents set date = '$date', title = '$title', number = '$number', prev_revision_date = '$PrevDate', prev_revision_number= '$RevNum', latest_revision_date= '$latestDate', latest_revision_number= '$latestRevNum', file_location = '$newFileLocation' WHERE no = $record_no") or die(mysqli_error($conn));
      die(header("Location: ../users/Scholarship/masterlist-documents.php?update=success"));
    }else{
      mysqli_query($conn, "UPDATE scholarship_masterlist_documents set date = '$date', title = '$title', number = '$number', prev_revision_date = '$PrevDate', prev_revision_number= '$RevNum', latest_revision_date= '$latestDate', latest_revision_number= '$latestRevNum' WHERE no = $record_no") or die(mysqli_error($conn));
      die(header("Location: ../users/Scholarship/masterlist-documents.php?update=success"));
    }
  }
  //delete
  if(isset($_POST['delete-masterlist-document'])){
    $record_no = $_POST['recordNumber'];
    echo $record_no;

    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_documents WHERE no = $record_no");

    $row = mysqli_fetch_array($result);

    $fileLocation = $row['file_location'];

    //remove file and then delete it in the database
    if(unlink($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_documents WHERE no = $record_no");
    }
    //if the file has been deleted through directory and not system, record still exists in the db. This is to still delete it.
    if(!file_exists($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_record WHERE no = $record_no");
    }
    die(header("Location: ../users/Scholarship/masterlist-documents.php?delete=success"));
  }

  //for external references
  //create
  if(isset($_POST["add-masterlist-external-reference"])){
    $date = date('Y-m-d');
    $extRefTitle = $_POST['addExtRefTitle'];
    $extRefRevNumber = $_POST['addExtRefRevNum'];
    $extRefModeoFFiling = $_POST['addExtRefModeOfFiling'];
    $extRefCustodian = $_POST['addExtRefCustodian'];
    $extRefLocation = $_POST['addExtRefLocation'];
    $extRefRetentionAct = date('Y-m-d', strtotime($_POST['addExtRefRetentionAct']));
    $extRefRetentionArch = date('Y-m-d', strtotime($_POST['addExtRefRetentionArch']));
    $fileName = PATHINFO($_FILES['ExtReftSoftCopy']['name']);
    $fileTmpName = $_FILES['ExtReftSoftCopy']['tmp_name'];
    echo $date.' '.$extRefTitle.' '.$extRefRevNumber.' '.$extRefModeoFFiling.' '.$extRefCustodian.' '.$extRefLocation.' '.$extRefRetentionAct.' '.$extRefRetentionArch;
    $ext = $fileName['extension'];
    //array for allowed file type
    $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');
    //check for allowed file type
    if(in_array($ext, $allowed)){
      //put future file size restrictions
      // if(filesize condition){}
      $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
      $fileLocation = '../scholarship-files/masterlist-external-reference/'.$newFileName;
      move_uploaded_file($fileTmpName, $fileLocation);
    }else{
      die(header("Location: ../users/Scholarship/masterlist-external-reference.php?type=invalid"));
    }
  
    $stmt = $conn->prepare("call addMasterlistExternalReference(?,?,?,?,?,?,?,?,?)");
    if(false===$stmt){
      die('prepare() failed: '.htmlspecialchars($conn->error));
    }

    $check = $stmt->bind_param("sssssssss", $date, $extRefTitle, $extRefRevNumber, $extRefModeoFFiling, $extRefCustodian, $extRefLocation, $extRefRetentionAct, $extRefRetentionArch, $fileLocation);
    if(false === $check){
      die('bind_param() failed: '.htmlspecialchars($conn->error));
    }
    $stmt->execute();
    // die(header("Location: ../users/Scholarship/masterlist-external-reference.php?operation=success"));
  }
  //read
  if(isset($_POST['fetch_external_reference'])){
    $record_no = $_POST['fetch_external_reference'];
    
    $result = mysqli_query($conn, "SELECT * FROM scholarship_masterlist_external_reference WHERE no = $record_no");
    while($row = mysqli_fetch_array($result)){
      $results[0] = $row['external_reference_title'];
      $results[1] = $row['revision_number'];
      $results[2] = $row['mode_of_filing'];
      $results[3] = $row['location'];
      $results[4] = $row['custodian'];
      $results[5] = $row['retention_active'];
      $results[6] = $row['retention_archive'];
      $results[7] = $row['no'];
    }
    die(json_encode($results));
  }
  //update
  if(isset($_POST['update-masterlist-external-reference'])){
    $date = date('Y-m-d');
    $ExtRefTitle = $_POST['updateExtRefTitle'];
    $ExtRefRevNum = $_POST['updateExtRefRevNum'];
    $ExtRefModeOfFiling = $_POST['updateExtRefModeOfFiling'];
    $ExtRefCustodian = $_POST['updateExtRefCustodian'];
    $ExtRefLocation = $_POST['updateExtRefLocation'];
    $ExtRefRetentionAct = date('Y-m-d', strtotime($_POST['updateExtRefRetentionAct']));
    $ExtRefRetentionArch = date('Y-m-d', strtotime($_POST['updateExtRefRetentionArch']));
    $record_no = $_POST['record-no'];
    
    $fileName = PATHINFO($_FILES['ExtReftSoftCopy']['name']);
    $fileTmpName = $_FILES['ExtReftSoftCopy']['tmp_name'];
    
    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_external_reference WHERE no = $record_no");
    $row = mysqli_fetch_array($result);
    $fileLocation = $row['file_location'];
    
    //if there is new file uploaded
    if($_FILES['ExtReftSoftCopy']['size'] != 0){
      unlink($fileLocation);
      //get file
      $ext = $fileName['extension'];
      //array for allowed file type
      $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');
      // check for allowed file type
      if(in_array($ext, $allowed)){
        //put future file size restrictions
        // if(filesize condition){}
        $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
        $newFileLocation = '../scholarship-files/masterlist-external-reference/'.$newFileName;
        move_uploaded_file($fileTmpName, $newFileLocation);
      }else{
        die(header("Location: ../users/Scholarship/masterlist-external-reference.php?type=invalid"));
      }
      mysqli_query($conn, "UPDATE scholarship_masterlist_external_reference set date = '$date', external_reference_title = '$ExtRefTitle', revision_number= '$ExtRefRevNum', mode_of_filing= '$ExtRefModeOfFiling', custodian= '$ExtRefCustodian', location = '$ExtRefLocation', retention_active= '$ExtRefRetentionAct', retention_archive= '$ExtRefRetentionArch', file_location = '$newFileLocation' WHERE no = $record_no") or die(mysqli_error($conn));
      die(header("Location: ../users/Scholarship/masterlist-external-reference.php?update=success"));
    }else{
      mysqli_query($conn, "UPDATE scholarship_masterlist_external_reference set date = '$date', external_reference_title = '$ExtRefTitle', revision_number= '$ExtRefRevNum', mode_of_filing= '$ExtRefModeOfFiling', custodian= '$ExtRefCustodian', location = '$ExtRefLocation', retention_active= '$ExtRefRetentionAct', retention_archive= '$ExtRefRetentionArch' WHERE no = $record_no") or die(mysqli_error($conn));
      die(header("Location: ../users/Scholarship/masterlist-external-reference.php?update=success"));
    }
  }
  //delete
  if(isset($_POST['delete-masterlist-external-reference'])){
    $record_no = $_POST['recordNumber'];

    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_external_reference WHERE no = $record_no");

    $row = mysqli_fetch_array($result);

    $fileLocation = $row['file_location'];
    //remove file and then delete it in the database
    if(unlink($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_external_reference WHERE no = $record_no");
    }
    //if the file has been deleted through directory and not system, record still exists in the db. This is to still delete it.
    if(!file_exists($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_external_reference WHERE no = $record_no");
    }
    die(header("Location: ../users/Scholarship/masterlist-external-reference.php?delete=success"));
  }

  //for transmittal
  //create
  if(isset($_POST["add-masterlist-transmittal"])){
    $date = date('Y-m-d');
    $transmittalDateTimeReceived = date('Y-m-d H:i', strtotime($_POST['addTransmittalDateTimeReceived']));
    $transmittalReceivedBy = $_POST['addTransmittalReceivedBy'];
    $transmittalRefNumber = $_POST['addTransmittalRefNumber'];
    $transmittalOffice = $_POST['addTransmittalOffice'];
    $trasnmittalType = $_POST['addTransmittalType'];
    $transmittalSubjectMatter = $_POST['addTranmisttalSubjectMatter'];
    $trasnmittalDate = date('Y-m-d', strtotime($_POST['addTransmittalDate']));
    $trasnmittalActionTaken = $_POST['addTransmittalAction'];
    $trasnmittalDateTimeDispatch = date('Y-m-d H:i', strtotime($_POST['addTransmittalDateTimeReceived']));
    $trasnmittalDispatchBy = $_POST['addTransmittalDispatchedBy'];
    $trasnmittalRemarks = $_POST['addTransmittalRemarks'];
    $fileName = PATHINFO($_FILES['documentSoftCopy']['name']);
    $fileTmpName = $_FILES['documentSoftCopy']['tmp_name'];
    $ext = $fileName['extension'];
    //array for allowed file type
    $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');
    //check for allowed file type
    if(in_array($ext, $allowed)){
      //put future file size restrictions
      // if(filesize condition){}
      $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
      $fileLocation = '../scholarship-files/masterlist-transmittal/'.$newFileName;
      move_uploaded_file($fileTmpName, $fileLocation);
    }else{
      die(header("Location: ../users/Scholarship/masterlist-incoming-outgoing.php?type=invalid"));
    }

    $stmt = $conn->prepare("call addMasterlistTransmittal(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssss", $date, $transmittalDateTimeReceived, $transmittalReceivedBy, $transmittalRefNumber, $transmittalOffice, $trasnmittalType, $transmittalSubjectMatter, $trasnmittalDate, $trasnmittalActionTaken, $trasnmittalDateTimeDispatch, $trasnmittalDispatchBy, $trasnmittalRemarks, $fileLocation);
    $stmt->execute();
    die(header("Location: ../users/Scholarship/masterlist-incoming-outgoing.php?operation=success"));
  }
  //read
  if(isset($_POST['fetch_transmittal'])){
    $record_no = $_POST['fetch_transmittal'];

    $result = mysqli_query($conn, "SELECT * FROM scholarship_masterlist_transmittal WHERE no = $record_no");
    while($row = mysqli_fetch_array($result)){
      $date_time_r = date('Y-m-d\TH:i', strtotime($row['date_time_received']));
      $date_time_d = date('Y-m-d\TH:i', strtotime($row['date_time_dispatch']));
      $results[0] = $date_time_r;
      $results[1] = $row['received_by'];
      $results[2] = $row['reference_number'];
      $results[3] = $row['source_origin_office'];
      $results[4] = $row['type'];
      $results[5] = $row['subject_matter'];
      $results[6] = $row['date_2'];
      $results[7] = $row['action_taken'];
      $results[8] = $date_time_d;
      $results[9] = $row['dispatched_by'];
      $results[10] = $row['remarks'];
      $results[11] = $row['no'];
    }
    die(json_encode($results));
  }
  //update
  if(isset($_POST['update-masterlist-transmittal'])){
    $date = date('Y-m-d');
    $TransmittalDateTimeReceived = date('Y-m-d H:i', strtotime($_POST['updateTransmittalDateTimeReceived']));
    $TransmittalReceivedBy = $_POST['updateTransmittalReceivedBy'];
    $TransmittalRefNumber = $_POST['updateTransmittalRefNumber'];
    $TransmittalOffice = $_POST['updateTransmittalOffice'];
    $TransmittalType = $_POST['updateTransmittalType'];
    $TranmisttalSubjectMatter = $_POST['updateTranmisttalSubjectMatter'];
    $TransmittalDate = date('Y-m-d', strtotime($_POST['updateTransmittalDate']));
    $TransmittalAction = $_POST['updateTransmittalAction'];
    $TransmittalDateTimeDispatch = date('Y-m-d H:i', strtotime($_POST['updateTransmittalDateTimeDispatch']));
    $TransmittalDispatchedBy = $_POST['updateTransmittalDispatchedBy'];
    $TransmittalRemarks = $_POST['updateTransmittalRemarks'];    

    $record_no = $_POST['record-no'];
    
    $fileName = PATHINFO($_FILES['documentSoftCopy']['name']);
    $fileTmpName = $_FILES['documentSoftCopy']['tmp_name'];
    
    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_transmittal WHERE no = $record_no");
    $row = mysqli_fetch_array($result);
    $fileLocation = $row['file_location'];
    
    //if there is new file uploaded
    if($_FILES['documentSoftCopy']['size'] != 0){
      unlink($fileLocation);
      //get file
      $ext = $fileName['extension'];
      //array for allowed file type
      $allowed = array('pdf', 'docx', 'xls', 'xlsx', 'doc');

      // check for allowed file type
      if(in_array($ext, $allowed)){
        //put future file size restrictions
        // if(filesize condition){}
        $newFileName = $fileName['filename'].'-'.date('Y-m-d h_i_s').'.'.$ext;
        $newFileLocation = '../scholarship-files/masterlist-transmittal/'.$newFileName;
        move_uploaded_file($fileTmpName, $newFileLocation);
      }else{
        die(header("Location: ../users/Scholarship/masterlist-incoming-outgoing.php?type=invalid"));
      }

      mysqli_query($conn, "UPDATE scholarship_masterlist_transmittal set date = '$date', no = '$record_no', date_time_received= '$TransmittalDateTimeReceived', received_by= '$TransmittalReceivedBy', reference_number= '$TransmittalRefNumber', source_origin_office= '$TransmittalOffice', type= '$TransmittalType', subject_matter= '$TranmisttalSubjectMatter', date_2= '$TransmittalDate', action_taken = '$TransmittalAction', date_time_dispatch= '$TransmittalDateTimeDispatch', dispatched_by= '$TransmittalDispatchedBy', remarks= 'TransmittalRemarks', file_location = '$newFileLocation' WHERE no = '$record_no'") or die(mysqli_error($conn));
      die(header("Location: ../users/Scholarship/masterlist-incoming-outgoing.php?update=success"));
    }else{
      mysqli_query($conn, "UPDATE scholarship_masterlist_transmittal set date = '$date', no = '$record_no', date_time_received= '$TransmittalDateTimeReceived', received_by= '$TransmittalReceivedBy', reference_number= '$TransmittalRefNumber', source_origin_office= '$TransmittalOffice', type= '$TransmittalType', subject_matter= '$TranmisttalSubjectMatter', date_2= '$TransmittalDate', action_taken = '$TransmittalAction', date_time_dispatch= '$TransmittalDateTimeDispatch', dispatched_by= '$TransmittalDispatchedBy', remarks= 'TransmittalRemarks' WHERE no = '$record_no'") or die(mysqli_error($conn));
      die(header("Location: ../users/Scholarship/masterlist-incoming-outgoing.php?update=success"));
    }
  }
  //delete
  if(isset($_POST['delete-masterlist-transmittal'])){
    $record_no = $_POST['recordNumber'];

    $result = mysqli_query($conn,"SELECT * FROM scholarship_masterlist_transmittal WHERE no = $record_no");

    $row = mysqli_fetch_array($result);

    $fileLocation = $row['file_location'];

    //remove file and then delete it in the database
    if(unlink($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_transmittal WHERE no = $record_no");
    }
    //if the file has been deleted through directory and not system, record still exists in the db. This is to still delete it.
    if(!file_exists($fileLocation)){
      mysqli_query($conn, "DELETE FROM scholarship_masterlist_transmittal WHERE no = $record_no");
    }
    die(header("Location: ../users/Scholarship/masterlist-incoming-outgoing.php?delete=success"));
  }