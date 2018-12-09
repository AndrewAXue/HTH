<?php
$displaying = false;
$coordinates = null;
$showHospitals = $_GET["showHospitals"];
$showSchools = $_GET["showSchools"];



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
            zoom: 11,
            center: hamilton
        });


        var array = '<?php echo $coordinates ?>';
        var obj = JSON.parse(array);


        for (i = 0; i< obj.length;i++)
        {
            var markerLocation = new google.maps.LatLng(parseFloat(obj[i][1]),parseFloat(obj[i][0]));


            var marker = new google.maps.Marker({
                position: markerLocation,
                map: map,
                title: "test",
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                          }

            });
        }



            if (findGetParameter("showHospitals") == "true") {
                var hospitalsobj = JSON.parse('[[43.240102736704635, -79.84658516395245], [43.238561228664494, -79.91710035478114], [43.26194143120613, -79.85433161542542], [43.24013072756382, -79.84500442878306], [43.25961289621226, -79.91762702390393], [43.248604890980836, -79.87092405415079], [43.24475398423596, -79.83686635075972], [43.24233812377529, -79.88312181245138], [43.22172114705383, -79.77384588448024]]');
                for (i = 0; i < hospitalsobj.length; i++) {
                    var markerLocation = new google.maps.LatLng(parseFloat(hospitalsobj[i][0]), parseFloat(hospitalsobj[i][1]));


                    var marker = new google.maps.Marker({
                        position: markerLocation,
                        map: map,
                        title: 'test'
                    });


                }
            }
            if (findGetParameter("showSchools") == "true") {
            var schoolsobj = JSON.parse('[[43.22494300365392, -79.76787899972841], [43.21433470693851, -79.71531332764901], [43.20398125067917, -79.87860549686357], [43.21615641444809, -79.74632421159], [43.26932131796197, -79.8597427084532], [43.22353244591759, -79.828767660345], [43.25240651223177, -79.88763305285096], [43.213646410056754, -79.91891476073636], [43.24059491937942, -79.81462108415528], [43.21498106006422, -79.83883492223438], [43.26780355874186, -79.86209236354546], [43.25754080586308, -79.8607941712719], [43.26161561012727, -79.87321576987785], [43.20802201374321, -79.99326422065114], [43.216849489221595, -79.99206544913359], [43.23760174840188, -79.79486515829518], [43.23362168261716, -79.79399594574605], [43.221722228906216, -79.95269538229529], [43.1817170321464, -79.78888997811063], [43.24573369283557, -79.8372625496965], [43.40526633334234, -79.99515302161403], [43.22273240059906, -79.92257553843959], [43.231518919072435, -79.92271607149632], [43.3586268662916, -79.93221352521384], [43.232082392224775, -79.7555339155548], [43.22574404878071, -79.78009662227238], [43.403903861745405, -79.99435097503122], [43.22885211356831, -79.73444870849522], [43.173471355689, -79.77033683521165], [43.22970775014828, -79.87751852404332], [43.209184551339305, -79.99209061723417], [43.203232507670386, -79.84231617155791], [43.2526631591308, -79.89258523380612], [43.235278473003774, -79.88861851874307], [43.237153690474535, -79.81503101264408], [43.22451012426228, -79.87928270940907], [43.32856723895998, -80.20050189102018], [43.240572186365576, -79.79073672214263], [43.238610193481485, -79.90625997680765], [43.191755353913486, -79.78386353357719], [43.27096165880068, -79.9553527838689], [43.218401190057314, -79.98830729805215], [43.18892015250402, -79.79152683879106], [43.125853798827656, -79.81276700746731], [43.21925808628584, -79.79784428457269], [43.21838395930296, -79.79548831849547], [43.227616109235825, -79.82310301684215], [43.24137888368282, -79.87297594268257], [43.25735701698606, -79.9209021674226], [43.253636704776795, -79.92774425593593], [43.3363413600521, -79.96017512657907], [43.224284094346515, -79.87490202698456], [43.253051542296795, -79.8480096099915], [43.24340327630152, -79.82034332557176], [43.24100869457705, -79.85614811830588], [43.26325153730924, -79.87580071890054], [43.28942866319596, -79.998427639601], [43.335294219322265, -79.91050553234588], [43.22445043507802, -79.80813096728203], [43.25753398329114, -79.97967621092174], [43.232291991684214, -79.79690540264497], [43.22481855901099, -79.77052861734143], [43.21340758005742, -79.66048929659274], [43.221895432280476, -79.74554938221134], [43.2230767731172, -79.89541698906716], [43.19889630243701, -79.89671635988687], [43.257204360438614, -79.84979890028568], [43.23288897033073, -79.91310811029658], [43.25535002407994, -79.83592257590261], [43.263914841099094, -79.9024154196358], [43.20139376853753, -79.79569550737037], [43.22319873632873, -79.92046509786861], [43.22073489741788, -79.8273110434352], [43.21810428472633, -79.89734832751455], [43.157140451591765, -79.92025531365408], [43.241367031559626, -79.925434494569], [43.2197098108109, -79.87069780178217], [43.24588326203603, -79.81341347079861], [43.24369632262536, -80.04850789670502], [43.22834550302353, -79.96271081198651], [43.253179340091215, -79.88242202546074], [43.21275914325411, -79.93618224258705], [43.241320189731, -79.803096141324], [43.221946280413874, -79.9101059999739], [43.24914050841144, -79.93452004311315], [43.25841468819062, -79.91242125952363], [43.22516197469788, -79.84257803094637], [43.21807212149823, -79.78770701169866], [43.19408280258118, -79.87179515203229], [43.21730138892224, -79.72760742092296], [43.22573537839916, -79.85187688504493], [43.241317824856935, -79.84940777730377], [43.22971457141618, -79.72711893549872], [43.23723308316841, -79.87467602817128], [43.18160340395163, -79.8162337029488], [43.3342859584987, -79.912271323431], [43.24690085602523, -79.83884884096852], [43.227734022633456, -79.77932312592864], [43.22461982576347, -79.77870715998644], [43.25236586324092, -79.83199079181011], [43.248333280420354, -79.86531953407169], [43.33904456663833, -79.8771367913873], [43.2583502040503, -79.95094001292199], [43.201500746232014, -79.84093721889194], [43.20863003381377, -79.98893644818484], [43.202841520818254, -79.8785899347443], [43.25415372874459, -79.87455278407133], [43.211765209414395, -79.82985739776777], [43.249505502985556, -79.82281452613904], [43.2599314678197, -79.90107865313779], [43.23871617670367, -79.81982095580007], [43.2639943542759, -79.88462640136545], [43.23039017576337, -79.83159017420667], [43.25255082480752, -79.85597264269532], [43.19180195637846, -79.8070195847513], [43.29845649052724, -80.07409622189554], [43.26953782862967, -79.95809986625729], [43.21999157762877, -79.73232769302591], [43.183763925467694, -79.77850823344303], [43.20579652806681, -79.852417826466], [43.21577721723928, -80.00445553675162], [43.2209468802764, -79.76351484651465], [43.274363310743276, -79.94529029789666], [43.18117076950841, -79.73347775033953], [43.22240645493594, -79.85775924618166], [43.33802723063022, -79.89768051149174], [43.20167375269742, -79.8641883670318], [43.25885400933959, -79.9730259600904], [43.215282899196325, -79.75924286725767], [43.220881558805395, -79.74913081616029], [43.21746798967806, -79.71106173345932], [43.19244484077872, -79.82406778202034], [43.233084602524706, -79.76110535028754], [43.239496155597514, -79.77689229889981], [43.20845201365864, -79.68230173985704], [43.21570656782414, -79.85040824533428], [43.23736292004031, -79.91376528559667], [43.17801934502028, -79.78619257718994], [43.227228650519145, -79.89571831458099], [43.22553748301088, -79.89445911145728], [43.19680607246401, -79.84814949188434], [43.202306128596206, -79.99496020133246], [43.257275752513, -79.84634564253302], [43.25103110427302, -79.8692765621014], [43.238104365047015, -79.87367084429468], [43.22819005275928, -79.8643950754449], [43.32789738478091, -79.90854637036193], [43.23343224741278, -79.75701128651512], [43.258425109347094, -79.86873445523906], [43.21253920335894, -79.82835712176335], [43.21066410846889, -79.64252531186001], [43.11691093467337, -79.81383272424526], [43.22806582394181, -79.86424368386018], [43.22613823442022, -79.7125177217458], [43.25392107172357, -79.87034070215371], [43.261220304932245, -79.86716373587659], [43.24346471706852, -79.81907693675963], [43.25526175617247, -79.86007184235233], [43.20910040371201, -79.95418426387256], [43.202346307116194, -79.86783926506592], [43.257912599617015, -79.97697829607486], [43.34356973390723, -79.91430342344339], [43.22042397220992, -79.94522490418467], [43.22755633007822, -79.841399502283], [43.247460373499074, -79.83959316169508], [43.20785861935258, -79.85573470243027], [43.21540140701833, -79.84116358175727], [43.13496568917635, -79.79762202878793], [43.24923186325069, -79.85819016412195], [43.25154219698211, -79.84132055158561], [43.23235311055924, -79.81246517941415], [43.25079893552347, -79.87984458599023], [43.25660255173317, -79.8372202871707], [43.22809312039298, -79.86443268107902], [43.26990294665116, -80.06423832415781], [43.250943805601395, -79.86566891963248], [43.292370941137776, -80.00737696657553], [43.23108519597211, -79.9127838522327], [43.25946744759035, -79.91850747318325], [43.259262294364106, -79.91759836090151], [43.22836248255884, -79.86432518504213], [43.22855802970455, -79.8642238096083], [43.241282613631455, -79.85282617055088], [43.22803708944814, -79.86410631233136], [43.22798573088327, -79.89334751717568], [43.22116356619978, -79.71005687579391], [43.19957690533876, -79.79664686842962], [43.237831838421215, -79.92622206908577], [43.22980475813038, -79.74586847402234], [43.238027823560245, -79.8866054716723], [43.23989920625962, -79.91549039841118], [43.2403919284256, -79.81370123499656], [43.255653451421836, -79.86094369078258]]');
            for (i = 0; i < schoolsobj.length; i++) {
                var markerLocation = new google.maps.LatLng(parseFloat(schoolsobj[i][0]), parseFloat(schoolsobj[i][1]));


                var marker = new google.maps.Marker({
                    position: markerLocation,
                    map: map,
                    title: 'test'
                });
            }
        }



    }




</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAhFU8SCQEF1LBtl0rt1O0JadwXGFKEUI&callback=initMap"
        async defer></script>

</body>
</html>
