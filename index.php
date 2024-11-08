<html DOCTYPE html>
<head>
    <?php include_once("header.php");?>
    <style>
        .row{
            padding:10px;
            margin:10px;
        }
    </style>
</head>    
<body class="container-fluid">
     <?php include_once("menu.php");?>
    <div class="row">
        <h5>Log Entries</h5>
        <div class="col-md-9 col-sm-7" style="overflow: scroll; height:230px;">     
            <?php
                $requests = file('access.log.1');
                $count = 0;
                $remoteHost=null;
                $remoteLogName=null;
                $dateTime=null;
                $timezone=null;
                $requestMethod=null;
                $requestedResource=null;
                $protocol=null;
                $responseCode=null;
                $sizeOfRequestedResource=0;// in bytes
                $referer=null;
                $userAgent=null;
                $numberOfHEADRequests=0;
                $numberOfGETRequests=0;
                $numberOfPOSTRequests=0;
                $numberOfPUTRequests=0;
                $numberOfPATCHRequests=0;
                $numberOfDELETERequests=0;
                $numberOfCONNECTRequests=0;
                $numberOfOPTIONSRequests=0;
                $numberOfTRACERequests=0;
                $remoteHostArray=array();
                $remoteHostVector=array();
                $statusCodeArray=array();
                $statusCodeVector=array();
                echo "<table id='myTable' class='table table-hover'border='1'><thead><tr><th>Remote Host</th><th>Remote Log Name</th><th>Datetime</th><th>Timezone</th><th>Requested Method</th><th>Requested Resource</th><th>Protocol</th><th>Response Code</th><th>Requested Resource Size</th><th>Referer</th><th>User Agent</th></tr></thead><tbody>";
                foreach($requests as $request){
                    $count += 1;
                    $splitedRequests=explode(" ",$request);
                   	//echo $request."<br>";
                   	//echo "number of items:".count($splitedRequests)."<br>";
                   	$remoteHost=$splitedRequests[0];          
                    $remoteLogName=$splitedRequests[2];	
                    $dateTime=$splitedRequests[3];
                   	$dateTime=str_replace('[', '', $dateTime);
                    $timezone=$splitedRequests[4];
                    $timezone=str_replace(']', '', $timezone);
                    $requestMethod=$splitedRequests[5];
                    $requestMethod=str_replace('"', '', $requestMethod);
                    $requestedResource=$splitedRequests[6];
                    $protocol=$splitedRequests[7];
                    $protocol=str_replace('"', '', $protocol);
                    $responseCode=$splitedRequests[8];
                    $sizeOfRequestedResource=$splitedRequests[9];
                    if(str_contains($sizeOfRequestedResource,"-") or str_contains($sizeOfRequestedResource,"\n"))
                        continue;
                    $searchValue=array_search($remoteHost, $remoteHostArray);
                    if($searchValue===false){
                        array_push($remoteHostArray, $remoteHost);
                        $sizeOfRequestedResource=number_format($sizeOfRequestedResource);
                        array_push($remoteHostVector, array($searchValue,1,$sizeOfRequestedResource,$sizeOfRequestedResource));
                    }
                    else{
                        $vectorItem=$remoteHostVector[$searchValue];
                        $vectorItem[1]++;
                        $vectorItemArray=explode(",",$vectorItem[2]);
                        $vectorItem[2]=implode("",$vectorItemArray);
                        $vectorItem[2]=$vectorItem[2]+$sizeOfRequestedResource;  
                        $vectorItem[3]=$vectorItem[2]/$vectorItem[1];  
                        $remoteHostVector[$searchValue]=$vectorItem;
                    }
                    $searchValue2=array_search($responseCode, $statusCodeArray);
                    if($searchValue2===false){
                        array_push($statusCodeArray, $responseCode);
                        array_push($statusCodeVector, array($searchValue2,1));
                    }
                    else{
                        $vectorItem2=$statusCodeVector[$searchValue2];
                        $vectorItem2[1]++;
                        $statusCodeVector[$searchValue2]=$vectorItem2;
                    }
                    $userAgent="";
                    $referer="";
                    if(count($splitedRequests)>10){
                        $referer=$splitedRequests[10];
                        $userAgentArray=array();
                        for($i=11; $i<count($splitedRequests); $i++){
                            $userAgentArray[$i]=$splitedRequests[$i];
                        }
                        $userAgent=implode(" ",$userAgentArray);
                    }
                    if($requestMethod=="HEAD"){
                    	$numberOfHEADRequests++;
                    }
                    else if($requestMethod=="GET"){
                    	$numberOfGETRequests++;
                    }
                    else if($requestMethod=="POST"){
                    	$numberOfPOSTRequests++;
                    }
                    else if($requestMethod=="PUT"){
                    	$numberOfPUTRequests++;
                    }
                    else if($requestMethod=="PATCH"){
                    	$numberOfPATCHRequests++;
                    }
                    else if($requestMethod=="DELETE"){
                    	$numberOfDELETERequests++;
                    }
                    else if($requestMethod=="CONNECT"){
                    	$numberOfCONNECTRequests++;
                    }
                    else if($requestMethod=="TRACE"){
                    	$numberOfTRACERequests++;
                    }
                    else if($requestMethod=="OPTIONS"){
                    	$numberOfOPTIONSRequests++;
                    }
                          
                	echo "<tr><td>".$remoteHost."</td>"."<td>".$remoteLogName."</td>"."<td>".$dateTime."</td>"."<td>".$timezone."</td>"."<td>".$requestMethod."</td>"."<td>".$requestedResource."</td>"."<td>".$protocol."</td>"."<td>".$responseCode."</td>"."<td>".$sizeOfRequestedResource."</td>"."<td>".$referer."</td>"."<td>".$userAgent."</td>"."</tr>";
                    //if($count==5)
                    	//break;
                }
                echo "</tbody></table>";

            ?>
            <!--
            <script type="text/javascript">
                let table = new DataTable('#myTable');
            </script>
        -->
        </div>
        <div class="col-md-3 col-sm-5">
            <div clas="method-summaries">
                <h5>Method Summaries</h5>
                <?php
                    echo $numberOfHEADRequests." HEAD requests<br>";
                    echo $numberOfGETRequests." GET requests<br>";
                    echo $numberOfPOSTRequests." POST requests<br>";
                    echo $numberOfPUTRequests." PUT requests<br>";
                    echo $numberOfPATCHRequests." PATCH requests<br>";
                    echo $numberOfDELETERequests." DELETE requests<br>";
                    echo $numberOfCONNECTRequests." CONNECT requests<br>";
                    echo $numberOfTRACERequests." TRACE requests<br>";
                    echo $numberOfOPTIONSRequests." OPTIONS requests<br>";
                ?>
            </div>
        </div>   
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6" style="overflow: scroll; max-height:200px;">
            <h5>Remote Host Summaries - Number of Requests</h5>
            <table class="table table-hover">
                <tr><th>IP Address</th><th>Number of Requests</th></th></tr>
                <?php
                    $i=0;
                    foreach($remoteHostVector as $remoteVectorItem):
                        $IP=$remoteHostArray[$i];
                        $numberOfRequestPerIP=$remoteHostVector[$i][1];
                         $i++;
                ?>
                <tr><td><?php echo $IP; ?></td><td><?php echo $numberOfRequestPerIP;?></td></tr>
                <?php
                    endforeach;
                ?>
            </table>
        </div>
        <div class="col-md-4 col-sm-6" style="overflow: scroll; max-height:200px;">
            <h5>Remote Host Summaries - Total Size of Response Object(Bytes)</h5>
            <table class="table table-hover">
                <tr><th>IP Address</th><th>Total Size</th><th>Average Size</th></tr>
                <?php
                    $i=0;
                    foreach($remoteHostVector as $remoteVectorItem):
                        $IP=$remoteHostArray[$i];
                        $totalSize=$remoteHostVector[$i][2];
                        $averageSize=$remoteHostVector[$i][3];
                        $i++;
                ?>
               <tr><td><?php echo $IP; ?></td><td><?php echo $totalSize;?></td><td><?php echo $averageSize; ?></td></tr>
                <?php
                    endforeach;
                ?>
            </table>

        </div>
        <div class="col-md-4 col-sm-6" style="overflow: scroll; max-height:200px;">
            <h5>Response Status Code Summaries</h5>
            <table class="table table-hover">
                <tr><th>Status Code</th><th>Number of Requests</th></tr>
                <?php
                    $i=0;
                    foreach($statusCodeVector as $statusVectorItem):
                        $code=$statusCodeArray[$i];
                        $totalRequests=$statusCodeVector[$i][1];
                         $i++;
                ?>
               <tr><td><?php echo $code; ?></td><td><?php echo $totalRequests; ?></td></tr>
                <?php
                    endforeach;
                ?>
            </table>

        </div>
     </div>   
</body>
</html>