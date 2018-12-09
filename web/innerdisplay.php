<?php
$displaying = false;
$coordinates = null;
$showHospitals = $_GET["showHospitals"];
$showSchools = $_GET["showSchools"];
$showLibraries = $_GET["showLibraries"];
$showCommunityCentres = $_GET["showCommunityCentres"];


if (!empty($_GET["json"])) {
    $coordinates = $_GET["json"];
    $displaying = true;


}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <meta charset="utf-8">
    <title>TITLE</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">


    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /*Optional: Makes the sample page fill the window.*/
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>


<body>
</center>
<div id="map"></div>
<script>
    var map;

    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }


    function initMap() {
        var hamilton = {lat: 43.2557, lng: -79.8711};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: hamilton
        });


        var array = '<?php echo $coordinates ?>';
        var obj = JSON.parse(array);


        for (i = 0; i < obj.length; i++) {
            var markerLocation = new google.maps.LatLng(parseFloat(obj[i][1]), parseFloat(obj[i][0]));


            var marker = new google.maps.Marker({
                position: markerLocation,
                map: map,
                title: "test",
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                }

            });
            var circle = new google.maps.Circle({
                map: map,
                radius: 1200,    // 10 miles in metres
                fillColor: '#7661aa'
            });
            circle.bindTo('center', marker, 'position');
        }


        if (findGetParameter("showHospitals") == "true") {
            var hospitalsobj = JSON.parse('[[["Juravinski Cancer Centre", "699 Concession Street"], [43.240102736704635, -79.84658516395245]], [["Chedoke Hospital", "565 Sanatorium Road"], [43.238561228664494, -79.91710035478114]], [["Hamilton General Hospital", "237 Barton Street East"], [43.26194143120613, -79.85433161542542]], [["Juravinski Hospital", "711 Concession Street"], [43.24013072756382, -79.84500442878306]], [["Mcmaster University Medical Centre", "1200 Main Street West"], [43.25961289621226, -79.91762702390393]], [["St. Josephs Hospital - Charlton Campus", "50 Charlton Avenue East"], [43.248604890980836, -79.87092405415079]], [["St. Peters Hospital", "88 Maplewood Avenue"], [43.24475398423596, -79.83686635075972]], [["St. Josephs Centre For Mountain Health Services - West 5th Campus", "100 West 5th Street"], [43.24233812377529, -79.88312181245138]], [["St. Josephs Hospital - Urgent Care At King Campus", "2757 King Street East"], [43.22172114705383, -79.77384588448024]]]');
            for (i = 0; i < hospitalsobj.length; i++) {
                var markerLocation = new google.maps.LatLng(parseFloat(hospitalsobj[i][1][0]), parseFloat(hospitalsobj[i][1][1]));


                var marker = new google.maps.Marker({
                    position: markerLocation,
                    map: map,
                    title: 'Click for more details',
                    icon: {
                        url: "https://kaveenk.me/hth/images/hospitalicon.png"
                    }
                });
                var infowindow = new google.maps.InfoWindow();
                var content = "<center><b>" + String(hospitalsobj[i][0][0]) + "</b><br>" + String(hospitalsobj[i][0][1]) + "</center>";
                google.maps.event.addListener(marker, 'click', function (content) {
                    return function () {
                        infowindow.setContent(content);
                        infowindow.open(map, this);
                    }
                }(content));


            }
        }
        if (findGetParameter("showSchools") == "true") {
            var schoolsobj = JSON.parse('[[["St. David Elementary School", "33 Cromwell Crescent"], ["43.22494300365392", "-79.76787899972841"]], [["St. Clare of Assisi Elementary School", "185 Glenashton Drive"], ["43.21433470693851", "-79.71531332764901"]], [["St. Marguerite D Youville Elementary School", "20 Bonaparte Way"], ["43.20398125067917", "-79.87860549686357"]], [["St. Martin of Tours Elementary School", "60 Grays Road"], ["43.21615641444809", "-79.74632421159"]], [["St. Lawrence Elementary School", "88 Macaulay Street East"], ["43.26932131796197", "-79.8597427084532"]], [["St. Margaret Mary Elementary School", "25 Brentwood Drive"], ["43.22353244591759", "-79.828767660345"]], [["St. Joseph Elementary School", "270 Locke Street South"], ["43.25240651223177", "-79.88763305285096"]], [["St. Thomas More Secondary School", "1045 Upper Paradise Road"], ["43.213646410056754", "-79.91891476073636"]], [["Delta Secondary School", "1284 Main Street East"], ["43.24059491937942", "-79.81462108415528"]], [["Richard Beasley Elementary School", "80 Currie Street"], ["43.21498106006422", "-79.83883492223438"]], [["Bennetto Elementary School", "47 Simcoe Street East"], ["43.26780355874186", "-79.86209236354546"]], [["Dr. J. Edgar Davey Elementary School", "99 Ferguson Avenue North"], ["43.25754080586308", "-79.8607941712719"]], [["Sir John A. Macdonald Secondary School", "130 York Boulevard"], ["43.26161561012727", "-79.87321576987785"]], [["Ancaster Senior Elementary School", "295 Nakoma Road"], ["43.20802201374321", "-79.99326422065114"]], [["C.H. Bray Elementary School", "99 Dunham Drive"], ["43.216849489221595", "-79.99206544913359"]], [["Sir Winston Churchill Secondary School", "1715 Main Street East"], ["43.23760174840188", "-79.79486515829518"]], [["St. Eugene Elementary School", "120 Parkdale Avenue South"], ["43.23362168261716", "-79.79399594574605"]], [["Ancaster Meadow Elementary School", "93 Kitty Murray Lane"], ["43.221722228906216", "-79.95269538229529"]], [["Gatestone Elementary School", "127 Gatestone Drive"], ["43.1817170321464", "-79.78888997811063"]], [["Adelaide Hoodless Elementary School", "71 Maplewood Avenue"], ["43.24573369283557", "-79.8372625496965"]], [["Balaclava Elementary School", "280 Concession 10 E"], ["43.40526633334234", "-79.99515302161403"]], [["St. Vincent De Paul Elementary School", "295 Green Cedar Drive"], ["43.22273240059906", "-79.92257553843959"]], [["Sir Allan Macnab Secondary School", "145 Magnolia Drive"], ["43.231518919072435", "-79.92271607149632"]], [["Flamborough Centre Elementary School", "922 Centre Road"], ["43.3586268662916", "-79.93221352521384"]], [["Lake Avenue Elementary School", "157 Lake Avenue North"], ["43.232082392224775", "-79.7555339155548"]], [["Glendale Secondary School", "145 Rainbow Drive"], ["43.22574404878071", "-79.78009662227238"]], [["Our Lady of Mount Carmel Elementary School", "1624 Centre Road"], ["43.403903861745405", "-79.99435097503122"]], [["Eastdale Elementary School", "275 Lincoln Road"], ["43.22885211356831", "-79.73444870849522"]], [["Our Lady of the Assumption Elementary School", "55 Highway No. 20 East"], ["43.173471355689", "-79.77033683521165"]], [["Norwood Park Elementary School", "165 Terrace Drive"], ["43.22970775014828", "-79.87751852404332"]], [["Fessenden Elementary School", "168 Huron Avenue"], ["43.209184551339305", "-79.99209061723417"]], [["Cecil B. Stirling Elementary School", "340 Queen Victoria Drive"], ["43.203232507670386", "-79.84231617155791"]], [["Earl Kitchener Elementary School", "300 Dundurn Street South"], ["43.2526631591308", "-79.89258523380612"]], [["Buchanan Park Elementary School", "30 Laurier Avenue"], ["43.235278473003774", "-79.88861851874307"]], [["A.M. Cunningham Elementary School", "100 Wexford Avenue South"], ["43.237153690474535", "-79.81503101264408"]], [["Ridgemount Elementary School", "65 Hester Street"], ["43.22451012426228", "-79.87928270940907"]], [["Dr. John Seaton Elementary School", "1279 Seaton Road"], ["43.32856723895998", "-80.20050189102018"]], [["Parkdale Elementary School", "139 Parkdale Avenue North"], ["43.240572186365576", "-79.79073672214263"]], [["Chedoke Elementary School", "500 Bendamere Avenue"], ["43.238610193481485", "-79.90625997680765"]], [["St. James the Apostle Elementary School", "29 John Murray Street"], ["43.191755353913486", "-79.78386353357719"]], [["St. Augustine Elementary School", "25 Alma Street"], ["43.27096165880068", "-79.9553527838689"]], [["St. Ann (Ancaster) Elementary School", "24 Fiddlers Green Road"], ["43.218401190057314", "-79.98830729805215"]], [["Mount Albion Elementary School", "24 Kennard Street"], ["43.18892015250402", "-79.79152683879106"]], [["Bellmoore Elementary School", "35 Pumpkin Pass"], ["43.125853798827656", "-79.81276700746731"]], [["Elizabeth Bagshaw Elementary School", "350 Albright Road"], ["43.21925808628584", "-79.79784428457269"]], [["St. Luke Elementary School", "345 Albright Road"], ["43.21838395930296", "-79.79548831849547"]], [["Sherwood Secondary School", "25 High Street"], ["43.227616109235825", "-79.82310301684215"]], [["Queensdale Elementary School", "67 Queensdale Avenue East"], ["43.24137888368282", "-79.87297594268257"]], [["Canadian Martyrs Elementary School", "1355 Main Street West"], ["43.25735701698606", "-79.9209021674226"]], [["St. Mary Secondary School", "200 Whitney Avenue"], ["43.253636704776795", "-79.92774425593593"]], [["Millgrove Elementary School", "375 5th Concession West"], ["43.3363413600521", "-79.96017512657907"]], [["St. Michael Elementary School", "135 Hester Street"], ["43.224284094346515", "-79.87490202698456"]], [["Cathedral High School", "30 Wentworth Street North"], ["43.253051542296795", "-79.8480096099915"]], [["Memorial (Hamilton) Elementary School", "1175 Main Street East"], ["43.24340327630152", "-79.82034332557176"]], [["George L. Armstrong Elementary School", "460 Concession Street"], ["43.24100869457705", "-79.85614811830588"]], [["Hess Street Elementary School", "107 Hess Street North"], ["43.26325153730924", "-79.87580071890054"]], [["Spencer Valley Elementary School", "441 Old Brock Road"], ["43.28942866319596", "-79.998427639601"]], [["Waterdown District Secondary School", "215 Parkside Drive"], ["43.335294219322265", "-79.91050553234588"]], [["Rosedale Elementary School", "25 Erindale Avenue"], ["43.22445043507802", "-79.80813096728203"]], [["Sir William Osler Elementary School", "330 Governors Road"], ["43.25753398329114", "-79.97967621092174"]], [["Viscount Montgomery Elementary School", "1525 Lucerne Avenue"], ["43.232291991684214", "-79.79690540264497"]], [["Sir Isaac Brock Elementary School", "130 Greenford Drive"], ["43.22481855901099", "-79.77052861734143"]], [["Winona Elementary School", "301 Lewis Road"], ["43.21340758005742", "-79.66048929659274"]], [["Cardinal Newman Secondary School", "127 Gray Road"], ["43.221895432280476", "-79.74554938221134"]], [["Annunciation of Our Lord Elementary School", "250 Limeridge Road West"], ["43.2230767731172", "-79.89541698906716"]], [["Corpus Christi Elementary School", "25 Alderson Drive"], ["43.19889630243701", "-79.89671635988687"]], [["St. Brigid Elementary School", "24 Smith Avenue"], ["43.257204360438614", "-79.84979890028568"]], [["Regina Mundi Elementary School", "675 Mohawk Road West"], ["43.23288897033073", "-79.91310811029658"]], [["St. Ann (Hamilton) Elementary School", "15 St. Ann Street"], ["43.25535002407994", "-79.83592257590261"]], [["Cootes Paradise Elementary School", "900 King Street West"], ["43.263914841099094", "-79.9024154196358"]], [["Billy Green Elementary School", "1105 Paramount Drive"], ["43.20139376853753", "-79.79569550737037"]], [["Gordon Price Elementary School", "11 Guildwood Drive"], ["43.22319873632873", "-79.92046509786861"]], [["Huntington Park Elementary School", "80 Kingslea Drive"], ["43.22073489741788", "-79.8273110434352"]], [["James Macdonald Elementary School", "200 Chester Avenue"], ["43.21810428472633", "-79.89734832751455"]], [["Mount Hope Elementary School", "9149 Airport Road"], ["43.157140451591765", "-79.92025531365408"]], [["Mountview Elementary School", "59 Karen Crescent"], ["43.241367031559626", "-79.925434494569"]], [["Pauline Johnson Elementary School", "25 Hummingbird Lane"], ["43.2197098108109", "-79.87069780178217"]], [["Queen Mary Elementary School", "1292 Cannon Street East"], ["43.24588326203603", "-79.81341347079861"]], [["Queens Rangers Elementary School", "1866 Governors Road"], ["43.24369632262536", "-80.04850789670502"]], [["Rousseau Elementary School", "103 McNiven Road"], ["43.22834550302353", "-79.96271081198651"]], [["Ryerson Middle School", "222 Robinson Street"], ["43.253179340091215", "-79.88242202546074"]], [["Tiffany Hills Elementary School", "255 Raymond Road"], ["43.21275914325411", "-79.93618224258705"]], [["W. H. Ballard Elementary School", "801 Dunsmure Road"], ["43.241320189731", "-79.803096141324"]], [["R. A. Riddell Elementary School", "200 Cranbrook Drive"], ["43.221946280413874", "-79.9101059999739"]], [["Glenwood Special Day School", "150 Lower Horning Road"], ["43.24914050841144", "-79.93452004311315"]], [["Dalewood Middle School", "1150 Main Street West"], ["43.25841468819062", "-79.91242125952363"]], [["Vincent Massey Alternative Education Centre", "155 Macassa Avenue"], ["43.22516197469788", "-79.84257803094637"]], [["Sir Wilfrid Laurier School", "70 Albright Road"], ["43.21807212149823", "-79.78770701169866"]], [["Ray Lewis Elementary School", "27 Jessica Street"], ["43.19408280258118", "-79.87179515203229"]], [["Memorial (Stoney Creek) Elementary School", "211 Memorial Avenue"], ["43.21730138892224", "-79.72760742092296"]], [["Franklin Road Elementary School", "500 Franklin Road"], ["43.22573537839916", "-79.85187688504493"]], [["Sacred Heart Elementary School", "5 Hamilton Avenue"], ["43.241317824856935", "-79.84940777730377"]], [["Mountain View Elementary School", "299 Barton Street East"], ["43.22971457141618", "-79.72711893549872"]], [["Sts. Peter and Paul Elementary School", "49 Fennell Avenue East"], ["43.23723308316841", "-79.87467602817128"]], [["Bishop Ryan Secondary School", "1824 Rymal Road East"], ["43.18160340395163", "-79.8162337029488"]], [["Allan A. Greenleaf Elementary School", "211 Parkside Drive"], ["43.3342859584987", "-79.912271323431"]], [["St. Charles Adult Education Centre", "770 Main Street East"], ["43.24690085602523", "-79.83884884096852"]], [["Glen Brae Middle School", "50 Secord Drive"], ["43.227734022633456", "-79.77932312592864"]], [["Glen Echo Elementary School", "140 Glen Echo Drive"], ["43.22461982576347", "-79.77870715998644"]], [["Prince of Wales Elementary School", "77 Melrose Avenue North"], ["43.25236586324092", "-79.83199079181011"]], [["Queen Victoria Elementary School", "166 Forest Avenue"], ["43.248333280420354", "-79.86531953407169"]], [["St. Thomas the Apostle Elementary School", "170 Skinner Road"], ["43.33904456663833", "-79.8771367913873"]], [["Dundana Elementary School", "23 Dundana Avenue"], ["43.2583502040503", "-79.95094001292199"]], [["St. Kateri Tekakwitha Elementary School", "22 Queensbury Drive"], ["43.201500746232014", "-79.84093721889194"]], [["St. Joachim Elementary School", "75 Concerto Crescent"], ["43.20863003381377", "-79.98893644818484"]], [["Helen Detwiler Elementary School", "320 Brigade Drive"], ["43.202841520818254", "-79.8785899347443"]], [["Central Elementary School", "75 Hunter Street West"], ["43.25415372874459", "-79.87455278407133"]], [["Lisgar Elementary School", "110 Anson Avenue"], ["43.211765209414395", "-79.82985739776777"]], [["Holy Name of Jesus Elementary School", "181 Belmont Avenue North"], ["43.249505502985556", "-79.82281452613904"]], [["Westdale Secondary School", "700 Main Street West"], ["43.2599314678197", "-79.90107865313779"]], [["St. John the Baptist Elementary School", "115 London Street South"], ["43.23871617670367", "-79.81982095580007"]], [["Strathcona Elementary School", "10 Lamoreaux Street"], ["43.2639943542759", "-79.88462640136545"]], [["Highview Elementary School", "1040 Queensdale Avenue East"], ["43.23039017576337", "-79.83159017420667"]], [["St. Patrick Elementary School", "20 East Avenue South"], ["43.25255082480752", "-79.85597264269532"]], [["Janet Lee Elementary School", "291 Winterberry Drive"], ["43.19180195637846", "-79.8070195847513"]], [["Beverly Central Elementary School", "1346 Concession 4 West"], ["43.29845649052724", "-80.07409622189554"]], [["Dundas Central Elementary School", "73 Melville Street"], ["43.26953782862967", "-79.95809986625729"]], [["St. Francis Xavier Elementary School", "298 Highway No. 8"], ["43.21999157762877", "-79.73232769302591"]], [["Saltfleet Secondary School", "108 Highland Road West"], ["43.183763925467694", "-79.77850823344303"]], [["Lincoln Alexander Elementary School", "50 Ravenbury Drive"], ["43.20579652806681", "-79.852417826466"]], [["Ancaster High School", "374 Jerseyville Road West"], ["43.21577721723928", "-80.00445553675162"]], [["Green Acres Elementary School", "45 Randall Avenue"], ["43.2209468802764", "-79.76351484651465"]], [["Yorkview Elementary School", "86 Cameron Avenue"], ["43.274363310743276", "-79.94529029789666"]], [["Tapleytown Elementary School", "390 Mud Street East"], ["43.18117076950841", "-79.73347775033953"]], [["Our Lady of Lourdes Elementary School", "420 Mohawk Road East"], ["43.22240645493594", "-79.85775924618166"]], [["Mary Hopkins Elementary School", "211 Mill Street North"], ["43.33802723063022", "-79.89768051149174"]], [["St. Jean De Brebeuf Secondary School", "200 Acadia Drive"], ["43.20167375269742", "-79.8641883670318"]], [["St. Bernadette Elementary School", "270 Governors Road"], ["43.25885400933959", "-79.9730259600904"]], [["R. L. Hyslop Elementary School", "20 Lake Avenue South"], ["43.215282899196325", "-79.75924286725767"]], [["Collegiate Avenue Elementary School", "49 Collegiate Avenue"], ["43.220881558805395", "-79.74913081616029"]], [["Orchard Park Secondary School", "200 Dewitt Road"], ["43.21746798967806", "-79.71106173345932"]], [["Arrell Youth Centre", "320 Anchor Road"], ["43.19244484077872", "-79.82406778202034"]], [["Parkway Learning Centre", "140 Centennial Parkway North"], ["43.233084602524706", "-79.76110535028754"]], [["Hillcrest Elementary School", "40 Eastwood Street"], ["43.239496155597514", "-79.77689229889981"]], [["Immaculate Heart of Mary Elementary ", "190 Glover Road"], ["43.20845201365864", "-79.68230173985704"]], [["Lawfield Elementary School", "45 Berko St"], ["43.21570656782414", "-79.85040824533428"]], [["Holbrook Elementary School", "450 Sanatorium Road"], ["43.23736292004031", "-79.91376528559667"]], [["St. Mark Elementary School", "43 Whitedeer Road"], ["43.17801934502028", "-79.78619257718994"]], [["Westmount Secondary School", "39 Montcalm Drive"], ["43.227228650519145", "-79.89571831458099"]], [["Westview Elementary School", "60 Rolston Drive"], ["43.22553748301088", "-79.89445911145728"]], [["Templemead Elementary School", "62 Templemead Drive"], ["43.19680607246401", "-79.84814949188434"]], [["Bishop Tonnos Secondary School", "100 Pannabaker Drive"], ["43.202306128596206", "-79.99496020133246"]], [["Cathy Wever Elementary School", "160 Wentworth Street North"], ["43.257275752513", "-79.84634564253302"]], [["St. Charles Adult Education", "45 Young Street"], ["43.25103110427302", "-79.8692765621014"]], [["St. Charles Adult Education", "150 East 5th Street"], ["43.238104365047015", "-79.87367084429468"]], [["Hill Park Learning Centre", "465 East 16th Street"], ["43.22819005275928", "-79.8643950754449"]], [["Guy B. Brown Elementary School ", "55 Braeheid Avenue"], ["43.32789738478091", "-79.90854637036193"]], [["St. Charles Adult Education", "60 Barlake Avenue"], ["43.23343224741278", "-79.75701128651512"]], [["City Centre Learning Centre", "77 James Street North, 3rd Level"], ["43.258425109347094", "-79.86873445523906"]], [["St. Anthony Daniel Elementary School", "75 Anson Avenue"], ["43.21253920335894", "-79.82835712176335"]], [["St. Gabriel Elementary School", "1361 Barton Street"], ["43.21066410846889", "-79.64252531186001"]], [["St. Matthew Elementary School", "200 Windwood Drive"], ["43.11691093467337", "-79.81383272424526"]], [["SAL Outreach", "465 East 16th Street"], ["43.22806582394181", "-79.86424368386018"]], [["Turning Point Alt Ed Centre Barton Ave", "481 Barton Street"], ["43.22613823442022", "-79.7125177217458"]], [["James Street School", "100 James St. South"], ["43.25392107172357", "-79.87034070215371"]], [["Nu Steel Centre 3", "173 James Street N"], ["43.261220304932245", "-79.86716373587659"]], [["SHAE School", "34 Ottawa Street North"], ["43.24346471706852", "-79.81907693675963"]], [["Gateway Alt Ed Centre King William", "225 King William Street"], ["43.25526175617247", "-79.86007184235233"]], [["Immaculate Conception Elementary School", "470 Kitty Murray Lane"], ["43.20910040371201", "-79.95418426387256"]], [["St. John Paul II Elementary School", "600 Acadia Drive"], ["43.202346307116194", "-79.86783926506592"]], [["Dundas Valley Secondary School", "310 Governors Road"], ["43.257912599617015", "-79.97697829607486"]], [["Guardian Angels Elementary School", "705 Centre Road"], ["43.34356973390723", "-79.91430342344339"]], [["Holy Name of Mary Elementary School", "161 Meadowlands Boulevard"], ["43.22042397220992", "-79.94522490418467"]], [["Blessed Sacrament Elementary School", "315 East 37th Street"], ["43.22755633007822", "-79.841399502283"]], [["Wilmas Place Alternative Education Centre", "770 Main Street East"], ["43.247460373499074", "-79.83959316169508"]], [["Saint Teresa of Calcutta Elementary School", "1 Rexford Drive"], ["43.20785861935258", "-79.85573470243027"]], [["Nora Frances Henderson Secondary School", "75 Palmer Road"], ["43.21540140701833", "-79.84116358175727"]], [["Ã‰cole Ã‰lÃ©mentaire Michaelle Jean", "2121 Regional Rd 56"], ["43.13496568917635", "-79.79762202878793"]], [["Bernhart House - Dawn Patrol", "125 Victoria Ave South"], ["43.24923186325069", "-79.85819016412195"]], [["Bridge Program - Dawn Patrol", "837 King Street East"], ["43.25154219698211", "-79.84132055158561"]], [["George R. Force", "1760 King Street East"], ["43.23235311055924", "-79.81246517941415"]], [["Grace Haven", "138 Herkimer Street"], ["43.25079893552347", "-79.87984458599023"]], [["John Howard Non-Res Attendance Centre", "654 Barton Street East"], ["43.25660255173317", "-79.8372202871707"]], [["Hatts Off Program", "465 East 16th Street"], ["43.22809312039298", "-79.86443268107902"]], [["Hatts Off Program", "366 Highway No.52"], ["43.26990294665116", "-80.06423832415781"]], [["CTCC Lynwood Charlton Centre Augusta Compass", "121 Augusta Street"], ["43.250943805601395", "-79.86566891963248"]], [["CTCC Lynwood Charlton Centre - Flamborough", "831 Collinson Road"], ["43.292370941137776", "-80.00737696657553"]], [["CTCC Lynwood Charlton Centre Upper Paradise", "526 Upper Paradise Road"], ["43.23108519597211", "-79.9127838522327"]], [["McMaster Medical Centre - Mental Health Unit", "1200 Main Street West"], ["43.25946744759035", "-79.91850747318325"]], [["McMaster Medical Centre - Pediatric Unit", "1200 Main Street West"], ["43.259262294364106", "-79.91759836090151"]], [["White Rabbit Treatment Homes - #2", "465 East 16th Street"], ["43.22836248255884", "-79.86432518504213"]], [["Woodview Mental Health & Autism - Hill Park", "465 East 16th Street"], ["43.22855802970455", "-79.8642238096083"]], [["White Rabbit Treatment Homes - #1", "529 Concession Street"], ["43.241282613631455", "-79.85282617055088"]], [["Gateway Alt Ed Centre Hill Park", "465 East 16th Street"], ["43.22803708944814", "-79.86410631233136"]], [["Westwood Elementary School", "9 Lynbrook Drive"], ["43.22798573088327", "-79.89334751717568"]], [["Our Lady of Peace Elementary School", "252 Dewitt Road"], ["43.22116356619978", "-79.71005687579391"]], [["St. Paul Elementary School", "24 Amberwood Street"], ["43.19957690533876", "-79.79664686842962"]], [["St. Teresa of Avila Elementary School", "171 San Remo Drive"], ["43.237831838421215", "-79.92622206908577"]], [["St. Agnes Elementary School", "80 Colcrest Street"], ["43.22980475813038", "-79.74586847402234"]], [["Turning Point Alt Ed Centre Fennell Ave", "135 Fennell Avenue West"], ["43.238027823560245", "-79.8866054716723"]], [["Mountain Learning Centre", "565 Sanatorium Road"], ["43.23989920625962", "-79.91549039841118"]], [["Woodview Mental Health & Autism - Delta School", "1284 Main Street East"], ["43.2403919284256", "-79.81370123499656"]], [["King William Learning Centre", "225 King William Street, 3rd Floor"], ["43.255653451421836", "-79.86094369078258"]]]');
            for (i = 0; i < schoolsobj.length; i++) {
                var markerLocation = new google.maps.LatLng(parseFloat(schoolsobj[i][1][0]), parseFloat(schoolsobj[i][1][1]));


                var marker = new google.maps.Marker({
                    position: markerLocation,
                    map: map,
                    title: 'Click for more details',
                    icon: {
                        url: "https://kaveenk.me/hth/images/schoolicon.png"
                    }
                });
                var infowindow = new google.maps.InfoWindow();
                var content = "<center><b>" + String(schoolsobj[i][0][0]) + "</b><br>" + String(schoolsobj[i][0][1]) + "</center>";
                google.maps.event.addListener(marker, 'click', function (content) {
                    return function () {
                        infowindow.setContent(content);
                        infowindow.open(map, this);
                    }
                }(content));

            }
        }
        if (findGetParameter("showLibraries") == "true") {
            var librariesobj = JSON.parse('[[["Ancaster Library", ""], ["43.22530917338574", "-79.97666063140129"]], [["Barton Library", ""], ["43.258031699450754", "-79.84121898138898"]], [["Binbrook Library", ""], ["43.12170437851469", "-79.80342947213485"]], [["Carlisle Library", ""], ["43.39605338581425", "-79.98108621096793"]], [["Concession Library", ""], ["43.24104159881205", "-79.85136825154244"]], [["Dundas Library", ""], ["43.265483892235544", "-79.95494871167945"]], [["Hamilton Central Library", ""], ["43.25894156065867", "-79.87069971576268"]], [["Kenilworth Library", ""], ["43.24349823716794", "-79.80884162931072"]], [["Locke Library", ""], ["43.25182285401401", "-79.88702203808717"]], [["Mount Hope Library", ""], ["43.16057987078495", "-79.91206219950452"]], [["Red Hill Library", ""], ["43.23028211377719", "-79.77194471914495"]], [["Saltfleet Library", ""], ["43.22229244917222", "-79.74507509332878"]], [["Sherwood Library", ""], ["43.22656912838139", "-79.82861768595231"]], [["Terryberry Library", ""], ["43.23031428003548", "-79.88674908217796"]], [["Valley Park Library", ""], ["43.19309594019813", "-79.79790001210846"]], [["Waterdown Library", ""], ["43.32362939957626", "-79.90479819381896"]], [["Westdale Library", ""], ["43.262568621520266", "-79.903476765601"]], [["Stoney Creek Library", ""], ["43.21286434677112", "-79.69140529595892"]], [["Turner Park Library", ""], ["43.198467046768194", "-79.87862786114596"]], [["Lynden Library", ""], ["43.23656020527914", "-80.14659537003942"]], [["Freelton Library", ""], ["43.397933408491", "-80.03876645367953"]], [["Greensville Library", ""], ["43.27528027034178", "-79.99612469234015"]]]');
            for (i = 0; i < librariesobj.length; i++) {
                var markerLocation = new google.maps.LatLng(parseFloat(librariesobj[i][1][0]), parseFloat(librariesobj[i][1][1]));


                var marker = new google.maps.Marker({
                    position: markerLocation,
                    map: map,
                    title: 'Click for more details',
                    icon: {
                        url: "https://kaveenk.me/hth/images/libraryicon.png"
                    }
                });
                var infowindow = new google.maps.InfoWindow();
                var content = "<center><b>" + String(librariesobj[i][0][0]) + "</b><br>" + String(librariesobj[i][0][1]) + "</center>";
                google.maps.event.addListener(marker, 'click', function (content) {
                    return function () {
                        infowindow.setContent(content);
                        infowindow.open(map, this);
                    }
                }(content));

            }
        }
        if (findGetParameter("showCommunityCentres") == "true") {
            var ccsobj = JSON.parse('[[["North Wentworth Community Centre", ""], ["43.31294721249394", "-79.92254634666881"]], [["Ancaster Old Town Hall", ""], ["43.22551230439663", "-79.97626454359411"]], [["Ryerson Recreation Centre", ""], ["43.25381278788129", "-79.88235644210206"]], [["Sealey Park Scout Hall", ""], ["43.330815209686776", "-79.88922044290048"]], [["Sheffield Community Hall", ""], ["43.29704067583658", "-80.2007439892497"]], [["Sir Allan Macnab Recreation Centre", ""], ["43.23107007362862", "-79.92168665738289"]], [["Sir Wilfrid Laurier Recreation Centre", ""], ["43.21781710413284", "-79.78676166429753"]], [["Sir Winston Churchill Recreation Centre", ""], ["43.23755850040588", "-79.79571433973884"]], [["Stoney Creek Optomist Community Centre", ""], ["43.22574089364487", "-79.7585276868391"]], [["Redeemer Sports Complex", ""], ["43.212106303957334", "-79.95200162372063"]], [["Ancaster Senior Achievement Centre (Asac)", ""], ["43.18453817547859", "-80.07058372095855"]], [["Valens Community Hall", ""], ["43.3828622273035", "-80.13089848389335"]], [["Valley Community Centre (Nigel Charlong)", ""], ["43.30166070386504", "-79.90846575272751"]], [["Valley Park Rec Centre", ""], ["43.19290423842806", "-79.79810583569792"]], [["Waterdown Memorial Hall", ""], ["43.33408713218786", "-79.89259153018527"]], [["Westmount Recreation Centre", ""], ["43.228372662169384", "-79.89431613007507"]], [["Winona Scout Hall", ""], ["43.20969529946014", "-79.64564256677153"]], [["Winona Senior Citizen Centre", ""], ["43.20874438631364", "-79.65308486860114"]], [["Woodburn Centennial Hall", ""], ["43.14656890666839", "-79.74280634128291"]], [["Ymca - Hamilton Downtown Family", ""], ["43.25432327073405", "-79.86988423359848"]], [["Mountsberg Hall", ""], ["43.434226463128375", "-80.04209171656004"]], [["Sackville Hill Seniors Centre", ""], ["43.22447690512324", "-79.86260426592914"]], [["Spring Valley Community Centre", ""], ["43.21714491028943", "-79.99783953126015"]], [["Dominic Agostino Riverdale Community Centre", ""], ["43.23251479104158", "-79.756767354129"]], [["Ymca - Flamborough Family", ""], ["43.33428595880552", "-79.91227132361688"]], [["Ywca - Hamilton Family - Macnab St", ""], ["43.25423089450302", "-79.87156481014803"]], [["Soccer World", ""], ["43.25721965032598", "-79.89413985271617"]], [["Mountain Sports Complex", ""], ["43.19887195088654", "-79.83707186564129"]], [["Players Paradise Sports Complex", ""], ["43.23107027746398", "-79.70248013367576"]], [["Lakeland Centre", ""], ["43.26209559259145", "-79.76832327735099"]], [["Stoney Creek Recreation Centre", ""], ["43.21763050596098", "-79.76306024563874"]], [["David Braley Athletic Centre", ""], ["43.26504364332839", "-79.91616538953649"]], [["Norman Pinky Lewis Recreation Centre", ""], ["43.2570466916642", "-79.8453080697163"]], [["Bernie Morelli Recreation Centre", ""], ["43.2500471102715", "-79.82997442217562"]], [["F.h. Sherman Recreation And Learning Centre", ""], ["43.19518010885993", "-79.75400703666024"]], [["Ymca - Les Chater Family", ""], ["43.19836189255679", "-79.87804501322543"]], [["Main Hess Senior Centre", ""], ["43.256036876963414", "-79.87764732839432"]], [["Ancaster Aquatic Centre", ""], ["43.21516879926916", "-80.00628298385762"]], [["Ancaster Rotary Centre", ""], ["43.21807224775518", "-80.0077893378293"]], [["Beasley Community Centre", ""], ["43.25805134334364", "-79.86178273189563"]], [["Bennetto Community Centre", ""], ["43.27008976581619", "-79.86093697441686"]], [["Beverly Community Centre", ""], ["43.29867640239487", "-80.1112781832198"]], [["Beverly Township Hall", ""], ["43.30047207385531", "-80.12663304435652"]], [["Binbrook Memorial Hall", ""], ["43.12300553296204", "-79.80403784665256"]], [["H.g. Brewster Pool", ""], ["43.21809991331717", "-79.71154333898465"]], [["Carlisle Community Centre", ""], ["43.3967784957488", "-79.98131996136647"]], [["Carlisle Memorial Hall", ""], ["43.3939428969837", "-79.98147985959972"]], [["Carluke Hall", ""], ["43.14540747545268", "-79.98547541389685"]], [["Central Memorial Recreation Centre", ""], ["43.249543290799735", "-79.85924282307775"]], [["Ada Bland Club 60 Senior Citizen Centre", ""], ["43.21735503732258", "-79.75834235741497"]], [["Dalewood Recreation Centre", ""], ["43.25836394938631", "-79.91315458049925"]], [["Dundas Community Pool", ""], ["43.26547442719099", "-79.96355632580912"]], [["Dundas Lions Memorial Community Centre", ""], ["43.267379056336324", "-79.96359359748914"]], [["Eastmount Community Centre", ""], ["43.23643371677038", "-79.84866004372734"]], [["Fruitland Lions Community Hall", ""], ["43.218536638069104", "-79.7045989964928"]], [["Glanbrook Arena & Auditorium", ""], ["43.13002607003663", "-79.83872096757962"]], [["Greensville Hall", ""], ["43.27684613337756", "-79.98836483627639"]], [["Ywca - Hamilton Family - Ottawa St", ""], ["43.24396148093369", "-79.81884626364793"]], [["Hill Park Recreation Centre", ""], ["43.22781850541992", "-79.86312510821163"]], [["Huntington Park Recreation Centre", ""], ["43.220747228388596", "-79.82939338728264"]], [["Jimmy Thompson Pool", ""], ["43.24939123299326", "-79.83025856294296"]], [["East Kiwanis Boys & Girls Club", ""], ["43.24855414547234", "-79.81073838642523"]], [["Kiwanis Community Centre", ""], ["43.213481500939245", "-79.69127601122061"]], [["Ancaster Lions Outdoor Pool", ""], ["43.21823249987303", "-79.99969967261036"]], [["Lynden Community Centre", ""], ["43.22657985948866", "-80.14621041535916"]], [["Millgrove Community Centre", ""], ["43.33515359398153", "-79.95942802610175"]], [["Mount Hope Community Hall/youth Centre", ""], ["43.16022469219231", "-79.91142878213512"]], [["Eva Rothwell Resource Centre", ""], ["43.26494955083168", "-79.84286448991884"]]]');
            for (i = 0; i < ccsobj.length; i++) {
                var markerLocation = new google.maps.LatLng(parseFloat(ccsobj[i][1][0]), parseFloat(ccsobj[i][1][1]));


                var marker = new google.maps.Marker({
                    position: markerLocation,
                    map: map,
                    title: 'Click for more details',
                    icon: {
                        url: "https://kaveenk.me/hth/images/communitycentreicon.png"
                    }
                });
                var infowindow = new google.maps.InfoWindow();
                var content = "<center><b>" + String(ccsobj[i][0][0]) + "</b><br>" + String(ccsobj[i][0][1]) + "</center>";
                google.maps.event.addListener(marker, 'click', function (content) {
                    return function () {
                        infowindow.setContent(content);
                        infowindow.open(map, this);
                    }
                }(content));

            }
        }


    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAhFU8SCQEF1LBtl0rt1O0JadwXGFKEUI&callback=initMap"
        async defer></script>

</body>
</html>
