<?php
session_start();
/**
 * Template Name: Takhfif
 *
 * This is the template that displays all pages with using visual composer to edit it
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */

get_header();

if(have_posts()) { the_post();
	//the_title();
 ?>

				<?php

					function Redirect($url){
   						 header('Location: ' . $url);
    					 exit();
					}

				?>

<style type="text/css">
::placeholder {
    color: #c1d9e8;
	text-align: center;
	font-size:13px;
}
</style>
 <div class="fre-page-wrapper">
    <div class="fre-page-title">
        <div class="container">
			<?php
			if($_SESSION["posted"]==$m){
				echo '<h2 style="font-size: 20px;">افزایش شانس قرعه کشی</h2>';
			}else{
				echo '<h2 style="font-size: 20px;">اطلاعات خود را در پایین ثبت کنید</h2>';
			}
				  ?>
            
        </div>
    </div>

    <div class="fre-page-section">
        <div class="container">
        
			<div style="background-color: #fff; margin: 0 auto; padding-top:66px; width: 100%; height: 839px;border-radius: 16px;text-align: center;">


				<?php 
				  
				  	
					setcookie(session_name(), session_id(), time() + 30*24*60*60);
				  	
				  	$listrand=["V5DcKwqFWGBoHrQdT","400", "505" , "c28bk9pUKqFaoR0zC" , "WoAViJ9cZnhGbSBDw" , "oTF0vM6CzVD4NGg8H" , "LyE5zBaeVUs0kNCbc" , "juv5hfQlIq27GC3Ob" , "tvJTiy54PkXosEblr" , "uvf694Ws3BKmoIgH2" , "IQjXKmuL03Tfc4p2q" , "OKpFtePrBHyndXDWZ" , "VXAvnBwhlD1FWTKfy" , "kMZhwljH4PvtdT7as" , "DnYIVpQ7Ah5gN2yfq" , "iR2WXZ8mnYqzOeIwU" , "nli8Jo7uR5y9VMQSL" , "fs9ZnPuVovz2Bk6Jr" , "uVAsBgbQY9rLOpThk" , "HGUNw3CqoWJabR0PZ" , "E1dsiSUFrcm5y8Bov" , "dvumyjsUOJ2ZoW4AC" , "U5L84j7dBc1OHpqEr" , "dVqFjObPD4yfWHGpe" , "0kgZ1QPTfSbwi7AXW" , "o3ySmIeMwP0zCgtFi" , "y9V3wjxBUTmbWDl4J" , "79McZ4Xd5HEoT6g0Y" , "PMpIi2N5OmrLJHfEv" , "T1MUsZuD8iJlSjdIt" , "qUerzCbwukfIMovLp" , "FPfdaA0UTG2qKpOtk" , "pL3c15je4T8Z7StE9" , "7jgiEyOFKGXZhkxC9" , "jkVU0qyXJFpLTY8tG" , "sGk7Iv2ailcwLYPXu" , "jUAkoMtxNBiJCPsTE" , "zFhtCnWRESalD60qd" , "4o6EXF0QZtRc7yJYH" , "FOc5jQsb9v0qSzidn" , "coe3ilm4qw6JNvZHr" , "QoSLhFjy8NEGt1xac" , "vxKIBG4MladTWbA67" , "wTG9pBQhJNubsnIoL" , "KwQc9uxVjAhRt8Mf3" , "asrBRfdU07XjVemKE" , "lZks9nhMNuEWU4xDF" , "do7kIipR4WYU5bXTV" , "BdlFk9T0WRuUgAmeZ" , "OaP1vX8GmIb6s9cNW" , "aPj6xKuDCQ4BTRni5" , "RsxjdV54nIwMyv2JH" , "n9U8mbGZavOwjzKiX" , "xkJj7VSyD30BceRTg" , "xPj7u4DgzdOayI3qh" , "TPKdn2upMiNcG3x78" , "h7UAOlH4bSmjrRzMq" , "NkeVvUiPTuGqdRFY3" , "Sxn9pyC0qrHalUENm" , "nxZhfFMpjYR9EwOol" , "taspWJuG7vAXmFqYg" , "q10NDdVhyeUtbIknw" , "TtJlO7wBDQUjyEveg" , "Utysk8V493ZbQJehr" , "VbQZS7HfgMDixX1c2" , "5CHU0ZNW8OcVLxMho" , "LldN1Z8okOwRfu6zt" , "9756XnvdoZipChPGO" , "S9RJxTOCyfvrH7Ya3" , "Zsm1IL3XkENGJFj6c" , "wFg7DxnPmIhcKSeyM" , "iI76rYFnR8DaMuZso" , "Wwg2PADhp0JKuLR5C" , "QSpYHOJNxcW7t3Rgs" , "lpX1rAzNaUKcHFLWB" , "ml4PFY1M3qUAvOEIH" , "9g4YsvqcF16eyRf7C" , "GU6XYrjgNTQxVaStu" , "GohibD4fjcWV6rtRY" , "BJbgcTWnjDUymKZ7v" , "OVNfxc7w6K2GDdLMS" , "R9EdDa6mzbgrU7NjS" , "DAq3STi04PQImZEGt" , "Vw0Ct1pBgilvUXN7Y" , "yiaqlPLgcNQ1DrdxA" , "Xld8VY1PsfqWv7eCQ" , "xzXU7SBeRiDvGQkpI" , "CrdSRDcivj074o3ET" , "4byx85sSekXdtImFB" , "pOidSGqYlgeRLzwQ2" , "qCSvj9iEGQnPU0g5t" , "7MkODtrlSemqpNIWJ" , "hB8ObFES5LVIY2gXx" , "4fOvCLGz0Qe8griNp" , "PJijDmkW7Zl5Qzgc0" , "NTBlfyzwg9HdRnPeh" , "Fz9UcdxmXl17wBvVq" , "h31GyKHrPnOQRsS6T" , "tVGP93qYF0vaCXBQO" , "5UkKXb6JqWoNSBVj9" , "Jy5gsouFvDh3ZwS24" , "cZHd9jqBEyYzp0CLu" , "8GWXJDdICZwUfO0KR" , "ti0VYMwkdTBZuIFAU" , "KSqbAo3Q0jNtM9Dgm" , "dTeRjtr5hDyu8SoEA" , "viD4BuCN9GeAp1WLP" , "wcrahf05ijPxWND1l" , "3dhXoT9rRZK5uk1Ci" , "W1VplU2f7swzMCXAq" , "D8XK9t2GUfYAezi7n" , "DP1YCk4wQKMx6INFn" , "ToqrJjwCk9U8B0ltO" , "TLvXqkRh7HIuodGr0" , "94LbpDeEW5ThSqZ6g" , "iDM3xVGm1FLtq0eBw" , "iqSETVIoelAy7CWvZ" , "odfBz6VJYeyWr0Qh9" , "jzR3OHGfMoTqwsUy0" , "mx7TGn8MC1pSBfQHj" , "mBjiNDXUsFP5OHnEp" , "AzSHbQ9c2ioWa1Irx" , "u5qAcYHoOCFL3dKU6" , "DeKTUcbsNM9FGZirl" , "6TVvEBJSKeWmZMAPb" , "Dp73aQhW1VowuqsSj" , "40g9RtXy5BPeQUvZA" , "rmOZ0vMl8kYwiWgDx" , "2yi8An4aTPqeDmVQ1" , "oYMrwGDx0L65R2zU7" , "BC5zAuPWoyT3lEV2R" , "vHwAjfdWpN9Ua3IoG" , "H3hOMGK5INeTUcxm0" , "mEGSX0Zz5Jrski19L" , "y7ixJgXvYS1fFrVbm" , "mhF7W5qjLe8NQG3xy" , "94yD0CqFMjedlougw" , "NF2njQYsEXPLcOxDy" , "j3SmaKloXFHPZJusQ" , "VLPx6ubi0WXTrRMJj" , "1zNBwk3b2pjPOWI5F" , "kadNX1OvCywQjIfDm" , "0Ep5sRXeKbMCcwTJL" , "12Rn3OKXDxVSGkoaA" , "3ZxcWDF2TuyOaK9Pe" , "xZ8O3iID7RpaKlmgb" , "IMyFS09gbX3r6cGQJ" , "zEUqA6LoKv4WiykDQ" , "8xVzti9C5Kvc0yfI2" , "37MfVHLdUtQWi16mq" , "HSh4K5PuwtIevXAMy" , "OfVs6tKzoy9FSZYGb" , "3Va4O5wjFGCY8J1fz" , "TREsoUClutazLgbcY" , "dNuJ86e2wtrsYIigC" , "kfjLoyqGDMFHx1BQe" , "Fz9P7p1bDVGtsn8UJ" , "rWxDsI01Y3U6HbenV" , "FdxsVoBHXJjiIv0pt" , "uBzC9VdqAa67xl8in" , "uhLgWH3SNXFKBVwAl" , "xCe5GbiMJlROIHak0" , "3ZEzxt9rC1wBs2KcF" , "4eq3S02tcnFusK6al" , "1ZcFu7Kftgoh5pk6q" , "2CY7mdrOFqwZX0H5Q" , "lSr6csdL0iuyP2UAj" , "MuVlkhtANmXC0FHb6" , "Xacdq13oJrW7zTymf" , "RneQM0gITOaoWmhK2" , "kgsjeRLrql9D78Kpn" , "VgkUZz1yAQpCT6vJu" , "mX2GyIjbodKxlfBSn" , "RXx9QIs4qJfCTgrcw" , "oAgLI6rPDNn71FZ5J" , "KSVpEdBNmyhslQZqC" , "eDj5JOvQlmXk9PcRq" , "mzgaXI3y5GbJWZH6K" , "DktGgiubmYvPps8qQ" , "NZMxfdeLCI6F7SUrg" , "eZRP2YwATlMi84tnX" , "y3iDtzZOqoBSIQhV6" , "dO5JPuiZMVvABIK7f" , "BrQWgXZOoJTmULzDq" , "VsIUpaOriyt5m4lnR" , "UWPonRi5bO84C2D9h" , "lZf7PosVrSDFtHMC9" , "4XhK7tZvYguUi6r91" , "A07N3xMkKnp1aJicP" , "bAarP1LCsBMlXWuxp" , "xsSjZWIDhLHJ9Rwou" , "6XylSDGnqRe210bxI" , "lHpJ0om5dSfO3MFrI" , "oLc0HlMq39r25OaDs" , "m0da3WfCuBN68KcJh" , "fs7IpHkOGYWNw0cb4" , "gtVhwKPnseSYk0I1z" , "7TE0VYeHoaxgh3vOD" , "0YqSVaAvBx3toyTwO" , "nwUZC9OEkiLqvmGh7" , "90SIjtTxWFzq54liA" , "oawV0EXsJ5qTZWm6P" , "R7VNZY6tvfx5nrIDa" , "8apYLtA5yemUjn7lZ" , "GFRZUuhJOV7oNWXce" , "CKF5oR689EPlqjQYL" , "A8xzeUr04CvNIE26h" , "YcOxAj9sWEurZdJoX" , "FIpxknaiV0rdKJvNS" , "0WZ6TCoLIdXnpA4ly" , "RGUSVE6YWgt9FDiQy" , "4GQvay56ukpbs09rT" , "SEApskc5IdPGyrofx" , "QPFHrKmG9Ce1jzpuo" , "q9rTBHik7yFOJcvXh" , "nC52MEPNqjTcYIp7s" , "i2JuDC9lV5kYbKAmh" , "3UkYayAjpxGFm8WPw" , "UOi7yaDTt1SY4ePks" , "b9SmzYQRBKdHxpTy6" , "KBkWinxhbIDosuatY" , "tX7vS5VfjUWOoHxil" , "Mhyd0FSQzPRNAuvTO" , "JSdMbgjOmiHuq84FK" , "x4svfgBkIZjDJet7n" , "A89izp2WmZJYhTX6O" , "FqvZDNnGlk7YRcVrB" , "TcXyR83zV6b9BIhMP" , "CQEvTH09hOA74dysw" , "8uISVRvygsMfEGDr5" , "VztM69glwiSFKRBUy" , "3bL1j7vHMtDiV0Qmr" , "lxydX7LugmTKvstkh" , "naVPx417TeGYoXuHj" , "WVuOvPKZX9G8301sU" , "LBza6jQEf9n83k2Rh" , "Mr731fKcgvRxdCDHy" , "P8CDAiwfx1agjsQFh" , "1M94Wd6Gk7HVIoRyS" , "sRg1dALUVyEiWewO8" , "CtgOl1P5TjYXfzBK6" , "gWuDCmpOvZRt2lxcA" , "wuj1yeAgb0axO4HoX" , "m3M69qbEyiwxIcSXJ" , "Z2l6DGASy0NRnpiIw" , "sQukhJ4S5gKHtwmNU" , "E8cQmYzgxD0a4R9bA" , "l8DqBabNX46pzGyQo" , "luRdOTqBZcyAwmC47" , "DjK59kq1uCBV43x80" , "NFSvh8jCZQHXsxeKl" , "XrxwyYotF3LAbEj2N" , "iKPEbaBghXyMCctxq" , "fZmaviJj1d6UPQMy5" , "J8RayblwvqAn91fWm" , "YnTyicuGIemNDREhA" , "219xSDiWjUzpr0mBX" , "eb5wRdmTkDQC9Yxlq" , "x91liFvtEKqWuZC3J" , "CV4DRFKbBPruX6cWk" , "PihGYL7qwIzZry9J3" , "SQbNyE2cXh4dVMeuG" , "xJ4E9K1shF05PkBSf" , "Ra6CmfyTN4YMS59pB" , "3sYU2lPKtjQfdJwuO" , "KHPr97knqDm1l3Gp5" , "ZvKrH1WGD0fmnA5ga" , "WASa3IyrzUu7PpXxn" , "lqf60XNrj18PxiWco" , "5poBOHz3sgxqbFu8L" , "kj8auP9gNfIKRZctq" , "cyqpfLmKliJBArPHQ" , "RbUynlhPfEGHsJeB7" , "xLT7zrIM9DvAcQewW" , "6TOgSKJciU2XAB4Ex" , "3kfoiOXw8Qe06FBr1" , "5KMf1oZludHwNjSRp" , "ESPjaDxKdt6JIWVze" , "pWGIu9jCd1htsbqYX" , "aSzitgncqReXUP6TJ" , "yh9trGuDwLOSloKm2" , "QClvW9kPXR4ZG8Jrj" , "hWCUrPQ4KpH89NeX1" , "Xntdq3RrLQ0yx28Os" , "DowhXxQI8ZNJdn1rc" , "9mK8dnHQTaurGC2U1" , "JenLr0RUklGi4aYvg" , "K89gT4hWQoY7NB0Rq" , "jets5X4IJSEPZKhTr" , "AmlpEu8qzhFnLDNi6" , "CGVPly4UXW3oA5pxD" , "nUWkt05VSe1wCrvia" , "nDmLYNIa0RFZgCSeV" , "XirLS0EbW3jJAVHQM" , "v41NjUgB5F0KTasiD" , "0VkuiBt1DrRLoTmW8" , "SdleNRITMs3z908qH" , "kXoUVlYFQJqagibrA" , "g6WuCAZc0fspUBaHo" , "4fMQq5k1lWXbSFBLH" , "AIS1s5v3zyiwubh7K" , "xeNaWQVhCycL68q4U" , "cPeJLtxURQTMh1DWK" , "qTAnZSQ9dzbxrvt3h" , "3p7mxUOR6bWkaCg1v" , "hrbGetFfP52jvsNVk" , "lzUH56hafxn2eVTFM" , "xkwodLtSu0FHP86Di" , "Dkcoz3AfIEByThWJ2" , "UDN2QYS6WG8hRPz0b" , "5Ft0TO2Gk4yZDugRW" , "oOz3ic6F9jNErKbYB" , "3f4YzX8cNqbAPkI5M" , "phK6AxYNIn9t3l71V" , "t7zJqIXbLSY6nsVWy" , "EXDGhydjqUzTKv9Rl" , "setvfT8iS7UQE19nN" , "NoWHSjFZhDbas7Akc" , "cwjCuOBeNKJPWt1I8" , "ET2ru1GSQyU5oXn3A" , "umx2LeVFpAcr5oy61" , "0YneDA5XZo8PpdwRH" , "Q7VJgx5st290q3edb" , "SEWdfixCYG04UN15I" , "fB167Rq92JE8nkobe" , "ZkYAJwiy6QbSon2tV" , "bnZx6mu5VotEdTgCU" , "GErd4vHPzbJ73BNOq" , "floaPTS3WcguZC514" , "yH6rRxV8vIcmWTo4g" , "XtDMugKGkcNEnaWIU" , "Y7DXAfCuZ46pmhx0s" , "c4eZhiRT9rOnMuBjK" , "EsNpCSMZwvWRa5KcY" , "6AixrM47mPd0jlUFv" , "bDgjm1MYZ2ToULhGf" , "eJKQFhDUfuP7SGgZk" , "3ES69aIN2lqgFM8xz" , "xlQ4iEqWaAmdpf3MI" , "mkpD4RBGt9yaEulrY" , "qMVgdQXBI3Wj87kJZ" , "4foeLGBxTP9h0akw8" , "DoMr5lXs4HGbJ0Whn" , "2yQMiRVojpCGJDnPa" , "61Nk5mF2jlWbodLUV" , "NOmzLSpZxRMevbBq1" , "AFhsG2ucx9NT0eOjX" , "QN9vonmIA7e04Jjry" , "e73dzBAlXW6KJowUv" , "ZqytnBMQW9Lr2FIhs" , "7RswnW5TdBEIDAtgx" , "O3B2bcgHj4sNCzFeQ" , "2uqWbVeIsPSOwrhDk" , "8otK6WuORmhpfQyPX" , "uAwDMrnWiK8ZVtNSh" , "Ow5UEL4DroF81Ivh3" , "SuPH64XalKOdmRDeA" , "1yExNo94M3nwhiYUK" , "3nIJpLcC4HsgTmS7Y" , "rmLbOWS53BoTf1sth" , "Li7bCdXlpGJTVr8Yc" , "xyAMD5K9B1uGwoSb0" , "zO7gI5tGKPiEaT8dc" , "asFMfTqkXG5Q8P3hD" , "bJ7CMH0KcXSP1wvO9" , "vqEHQWF1wcjRYNAzt" , "Rr4JefvhqAXpiMg26" , "yXqLwcdPan24m6sZO" , "8MLT5FozQ3sWncSJU" , "e1YiEI6GKAT4MrCmN" , "czqB4UGgXNFhM7btd" , "mwIiDXx1URCGp3rP6" , "Sao6ktnhM5P3uvOYm" , "YTRXxVI3gZdHnwsvJ" , "QEs9Djehu2IKFlG3C" , "H2Blktd3MPeoqLXFY" , "yPJL5l9DQfNBMcvUS" , "loVNAEyqeZhnQ0C9a" , "nJrhb4DuN0cBkKq2i" , "SPZ1oTNRdyIHz0MBl" , "YIRPtUDy2wCWeiVxo" , "05ycZaPwDMsJngmtW" , "vhxuHmMGIRlB4nJj2" , "mXMjZP0B1iy4l2Jpw" , "FxsCNbJ043ulLyWej" , "FqL1lkgNzhI7BPnMo" , "pKvr8FZM1k2HS3Qzl" , "5a8gtkbFo9vGquAmi" , "SEwqJQk8NALvp6P9Z" , "56Fw0Y4HOhGQuMxn1" , "EQukFxC1J69ZiUo3Y" , "AgBLmpdHRnwWkas1M" , "YFow94GIMjTLAJpVO" , "cFkqZYjgXK7ON3wsT" , "MkVdnWfwtiCTyKrq2" , "GmPOlVheznNfuYCd9" , "WcglCQhZJeoAbFE1w" , "ZjREbtwS0nrPI4Mxl" , "6ldS0XGsmBoFgVwq9" , "vVmdbwGReCnspZrK4" , "Tg3DoFSaCsdb5t2zp" , "2l1MNAfn7BpHXcJqm" , "wcrLPvMUeuloWE2GN" , "5LuPlKrnfetHCONYp" , "RvGpJuPZhi5fTMHWX" , "pyUtCHWd5gfSv6ZcQ" , "zKLoH8TXgAncb7yRq" , "nHTiVX75LImyhBsr9" , "JHZPGadMh1pmqOCSQ" , "PcNiQvMKRzfoZ8HBC" , "0xmUzs8F1jSZT4foP" , "bqur97SDavpMV1xoO" , "7wtfPiy1pHsv4cxLT" , "smE3UIJHjot4aPGS7" , "L5m4aVrTkbvQHKj01" , "3gNWJB7nFx1yQTp4j" , "APZKlrof4CbWwgcIH" , "BJUFdOEY5CXDpAiMZ" , "sXmDGlRg4eO9AQih0" , "EgMVbKhB3OrLj2vui" , "SadPB6U7Le0bGpNz1" , "4GmbFCZdEQ63lVj2v" , "aP6r7hVfoCUDxqS5p" , "pfy2wUdecDEgGhK9I" , "3KwbHoicS5Ms2Xnqv" , "tw5lXSM2qaQnCzKWY" , "H3EViulU65mDf24bA" , "Fs1fIw5HKQ6nXPzM2" , "6fip5KSYevgTwURtl" , "ivGdQ04KfjSVmsMPD" , "OVQs1REDyHaLzo5IZ" , "IokObSJvy2f4lmqw6" , "FdJlAebpXscT4kDW1" , "TbRPoz3BdGZSAvpMh" , "hN5ubOqYeLndpaM0w" , "L0Ik29sDwfbSAuthB" , "JL1RrW4gflU08YIXV" , "cTrL4VO8hbk7oPadl" , "tIhadF9J6WgSMBQex" , "vB2kmhDUoYQIM14qe" , "cdQSKW9PCYGqngps7" , "XVsK9fnRSqwt8aPxb" , "6A05WIcjSpdHsoi9f" , "zTFXsHEtLrh8dwUya" , "9HOBVAM0oNGpzJIjK" , "KzZiNPfg1eRwUFukh" , "LrYVSGzbM3NfvtJFZ" , "3Vfbk8FDhM2HTSe1v" , "iRau4w80gMAsFNceJ" , "PmRIcyS0ujfL1bKOq" , "kiod8MQwel2IGJmD0" , "9zygitPuxKS8bndpT" , "4pdVDFiW2KtQXkyae" , "cWpMiTILSx0X317fZ" , "7dWj0sZ5LFpUShbMr" , "f5SQDU2P89VygNW7p" , "WAKQYznZqHOujaF2r" , "KLIck5ApwlRinrYCV" , "nikxQ4GIBFPJmwgWL" , "6hUXLkKY3dOV7FAJM" , "B4hOYUPekMoK0ZwmX" , "ILaOJY87GiMKPNCo5" , "ts9kO5rUH2jw6VGFR" , "KdoZNUEL3VPhrQY7T" , "g8qCIhbxzfUn1s3lv" , "cGVhwsHemr5yiug0B" , "GlN0wLfDHsEbU7cFY" , "Fhj49NZg7x5YGeRfW" , "Z78YfGEVPWpMqvrit" , "MSNbWvCxhtYkiV3c5" , "zvfPBjGEZyWRh3UkO" , "IWCOlGkco2FEuy0M5" , "3lyZh8R9SQskGmdou" , "y8LBh4Rw7qe2joAEm" , "HuYd6I9OgbCFpVTLo" , "SUchfpwDYFjs49tBy" , "MOVDqrhCl9Q4cjENg" , "xfaX1yHRzr9ASpMBj" , "7V5t4j0k9XY1wZCDh" , "bptMCHR2Q8vEz356c" , "Bvjm9QqVtHn5K2oNx" , "GMTRcvzJh8fbQ0kge" , "zmWcULp9ZikQBgSJ0" , "IGzWTMCLHUqZE2R1B" , "Ajl1Z7HR9atwmL3bX" , "iOPHxBFDyQRN6k1l7" , "TdERbxLylzfoVhItq" , "haoHpNSJjWk659Lfd" , "Mg1xSae9Auh6Fptyd" , "3GTKM9br0xPHia6kX" , "49iBoKJP0je1s6phX" , "BWa7OXj4lSgEYi9Cw" , "aPB5yqDfxApRuthg4" , "4nKPW7d12gTSycxtR" , "yWOa0osGBKY91fQuk" , "GJnADwNCUPiaQmKkp" , "SXkAmPaf62CJ8cgre" , "g4Q2DpFL19JNoCzcy" , "egJ2f9Do6FUA4B173" , "NV6hXtW9Dm8cnIYwM" , "4juKHRL05wFOiU2A9" , "V9recMgZzTxDinRpC" , "wybPze9vY4lqcmLI5" , "3dLNgA1wuJcImPokp" , "oUdl3D7BQatu0NGi4" , "TUIV3MxYrnB2cOXNo" , "6XEPWQ32vLa1Omwg7" , "FQrCsX3bhxJ1pwf8v" , "hvXJBkG9na7qcWdyF" , "lf8wRcEsv7hWj53N6" , "JR4eEO7miqVBAynPa" , "1PYvAI65fbqui2cBy" , "y8RXpZzQrbWoecj9S" , "nCtg2SWyi5BX0d6Zu" , "ejv53ywHaYTtBmOAR" , "Ff0yk1vQaI6Pml8LG" , "OBb5lGxpZjdo1CNDY" , "lW5ROTPDvnxhwL2rI" , "ncNk6dTDUybs52QVE" , "KjiCzlI7S9aeRcxUy" , "nJ0DHNbk5VITf2aWR" , "rPi0C18mJGQUOyIu5" , "R70GjUqcEHYsBXgNa" , "aV9zrNKGxRLCpcB7b" , "qs7Ip9Ki1tygwRvzP" , "r1PeRLyJ5MZbzsF2B" , "ICQbO5Xv1DcsyquUl" , "2SZKci5Hda3zPYCk0" , "txgZMjIWmRQJsyNeh" , "0D3vdiecbVAKuBjgx" , "ZUohLNXajgyWvtbsF" , "GWucx4pZ0IBt1UFYN" , "GifTl5I4ojrD0Fuqg" , "30eXuzTcI6LCapERN" , "36dHuVJes4TIpoCMF" , "dDB6ihgICZopQu7U9" , "UDBnAoETpgI6KRb4m" , "cqdbfpTEyKtUmXjFe" , "NvEelbLW8ouP7GqtS" , "urfezRw90OEmWSkCL" , "LhIftYnzvupqy25SH" , "S9Ah30JYBHgiwDyX4" , "zh0JnRYLXTxFmoCbV" , "gOb5r3tsRJqVDABu6" , "qktzX0K3FVpyxcOJ7" , "hdO7YrypGz90Mc8uU" , "ZmXzi9xp483AkMKqe" , "6dr7JWDtncjloaPpy" , "o41zm8bEpSRg6tYwJ" , "JLqIz4vYE9O3DfSbB" , "dtILMU1VDXHbfTe9j" , "imjJvWPdlF1KDXkZa" , "SoTkr7D1dhKsNz8X3" , "LwqGjIo4NFsYv2MBV" , "MUSzs4b7wq1ViXQel" , "K27Fgk1D9Mzbm0ZRE" , "DcPa9sdSL0XOxAk8E" , "Ko0jrENyWUF81kLRd" , "vVFH1cufgIKO7iRX5" , "b04VlNUyP2EHXSCiJ" , "LkFpuUn5zd36t2iSG" , "cNy7vrjE6HZntRB8F" , "fPSAgJyiRBv6xDLcj" , "aZ6s8JUXQRrfpkuCW" , "F85NL6ykQECR943Af" , "f2Ph6TClaRnH8gr53" , "RsKAuF26trZVzG3aJ" , "l7peTIizakB1Sgcvt" , "XYq8wEHLp5D2sAeKr" , "8meFlpf0NCn3o6SiY" , "sIeS6Q8GXJyNawfFk" , "uKDTZQHY7bl5cOPoS" , "NgtmPrFwn9Zo5sMuz" , "zBsqRdfmyNGWXZvTH" , "icZz20AVGDMSsukNY" , "NThWL1sVDFZ7HOv0I" , "vDr2OQ4HNeBinRksS" , "C98Qs0BFLxH1cndXg" , "FuoZcqOTnQjyA8rgS" , "PwpChGmJ76qMQOHgA" , "9oAfgsaVOWQblF1q0" , "x3mlO8gf9HoSNRK0M" , "feTIXNWP3KJ2uUSs6" , "lXsp923zoUMtKBAFS" , "rCbtZNLpGAzVnyHka" , "1wmAFhrIRscniQq94" , "Zfxd24XFyMhI7GsJH" , "6MQO2UbBx7oAtCHLP" , "LO4qnuN3jE1GxvbHT" , "svckEAxCVXFtuZwj4" , "ejz7648TBqYtslOLv" , "MCQ8JiyK5xpmg1Ntw" , "VY7AfmxMKXyJoCheZ" , "NBpQWZ8ev1wqnTCyL" , "Am7rD81jVLqO4azPt" , "qan4ZoOtY2QyAdRiT" , "De6BFwKNnH759UrVc" , "t1udNFAwGhjOmBWv3" , "46X5CVkzRSed8NFt9" , "M0mBIuSWUnblRzG3d" , "MyfEWJzYlU4vCcgnm" , "TR2uzD97gHhPwcXdC" , "mT5xDudrs01cFWoZR" , "KsyqZwgAHctGDvhSX" , "2R5ZWTiXFkPrQ4wOe" , "iVqbICrS4AsPMlnG8" , "zB9Y7RPeHOIglk8xu" , "icul8zhk3W0tyIBv1" , "rn9NTjeFkbfcPvDyh" , "k10MGjRdf5wSCiYLc" , "5Iw7hmRrSUXpdTaq1" , "GMezjqudIcBm75gNR" , "fPhptW4HkijClgGR5" , "TyAL6CoSxHDkqse5I" , "BFQ6J9hxwgcM2byjk" , "E7U2mrf06WCOHItSF" , "0s5OBjqlLuIVNS49g" , "LE7kSuz92iv4DZenR" , "7oX0Uab596qd1chFS" , "saTDtQnH2POEU3y0j" , "hNW9sVcPAF7S645no" , "BO95doA0HWCNIXakR" , "PBCUgpDn3Hc6NQhFb" , "2ALjSs5vEVFCrqepZ" , "XpyFo7OPDTcBm3dg4" , "5syvqoD7CPFjGEHO6" , "ogVsIS1fiP0GWEFJx" , "8TEhf3P0L9IDkQXm2" , "VZJL8RQ9xN6mWDyA2" , "lsS63wLRyenkfNXIg" , "bAoQMva6I3USy1k7C" , "kVr7Sh3iWZYKOop4m" , "IL6VRn8cDwjh7tfza" , "QjlrGxpckNBbC5fus" , "9preMOW5UKHdkv0Rx" , "aikzjpPTOdmL4QoSw" , "FpSGVycMvohftgHaU" , "RZBxYHornWwGOsUqE" , "ntAVgFydf1GQJhsWr" , "9z5STvGI1a76jrgp3" , "givkPao2wC6brpxsJ" , "eD25qEYgZcLA83baf" , "yREHxYK9kw3ZnGOWQ" , "A2BMKODu9Ytl6S74p" , "0rPjldRIEvfoUtNap" , "MjLERNB0tci5HpsDP" , "ucxKayQqd4HSMBgYZ" , "qW2jc4gDE5RfIQvJ0" , "fcniRwAOx0yBuGgT5" , "Hbmlsa9J1AchIVy4n" , "YXk52sJ3c8mqWyTSa" , "8ULtFolKQsbr6EiBv" , "H4SmqUyx1Jl7uC8zi" , "ao52LiFNZDz1uGR3k" , "cV0DKXUIoF3GfsSyl" , "G2i6ZwUXmYPd9oj8v" , "5RoVPFdsMfymzQ4OI" , "gRw6LWUBQJ5EdP2vF" , "NSoKf1Di5cP3VEgty" , "aTg6iyK29hqdSHNoZ" , "9BygPQrafF4pz2UkZ" , "JjI20SLbKB71XxnW4" , "iSB0a8nWYeqVQXct6" , "xfwrjFs2PgpGbLldK" , "l3An48mHeruVMJXjd" , "KST10HGAMwbjNQaVU" , "WvB6dLaRknghIEwmy" , "pfTdrCblnFveEJV2t" , "VuMIO8sf64kpyS5UG" , "Py6kYEwA1fb290SHM" , "vk0Ucn6xyRbYqi2OK" , "eM05CPIU1amrzAK46" , "f2H9dT58khGqYxeJo" , "fERK8OTaDqm9MA15N" , "wlJG1OSotFhmNiDYp" , "klNA6QLMI7za5CEoU" , "mn84cAv5xH7a09V6Y" , "Ke2wduU4kifLrzCOv" , "osQTzPhR9wtZABpnc" , "yWh6AeCY897NaTnzu" , "4rIo1TAeiQxcvVwFK" , "Yxosc1wRBMGU6b28I" , "G8xUZ0qfWpBRDXOY9" , "kJUG2otVRSuXnMjeh" , "ZRTna7fsp1HmVLSeq" , "lHQbmZaNySO041Fix" , "fx6AzqDIeJSt0iUsP" , "Mycev25LO17IZmfXR" , "BmyaVuQgNlbYe0wDA" , "EaUqLg4t7Qkol0NDr" , "Sigw2tHWaGYdTvuBq" , "4tQpvaHJghMBEur3c" , "hWp18x5AdzXrnmsLJ" , "BOoZaI2AXrbDhn61P" , "DzlaxbewAfCPOX4m3" , "s3heGVNPAcIHnlvjK" , "aAKpO3hUzqlJjtTCX" , "7Xk6frd8oeKIiMaBw" , "ClthXRsmLJzQ82ZiD" , "xiGrwZcunT2P3dzLs" , "IZVfDre0NUJAodWX7" , "qDgGb19pCfIHKyLEo" , "zFAd4sGKmNpBfxTyP" , "q84kMZ5uVopTDRWHa" , "o2AmLJeKE8BlhH7Qg" , "IzuFsBqC9njxakMHQ" , "ycY6j4Cef1hXm8KQn" , "DYmidhX6MQOVjTKnU" , "SYUX2Isfe5ma48wPn" , "FHQX1IsYmPDaTV2oE" , "YMsB7pT9vOClF3dtZ" , "76SktREYmoQj3F94a" , "uCclYaiUhTr2MLpDX" , "odE8jb5Duy6YWleqN" , "BcUbtQz6V0POxHCLf" , "I07C1YBFd96nfoXTM" , "e3MSNlqvUC8wQYPWf" , "qAioY5QxmesF9KCdL" , "F7Lcwjo9iXEh0KRAS" , "O8aWdSAXrc1Y95gHR" , "mOJu49SCKnkyecBob" , "HjfJYnRuipCSVt8X1" , "RD92uJjYImNboFnOe" , "W3VFfeRzyUDHlGNmv" , "8mKjQ3zdaIZwhAPbV" , "ZTglb36oC4BycDWXz" , "YbAP07lqQUwF1fEcB" , "Nx1H0ya8AgUjILRvJ" , "egJwkQzG10ZM5hiRc" , "lL4P6o8eNFM9xiHOs" , "FUznv0VRjugOwbdS6" , "fd7eSwUDAVsOXI8Q5" , "vwlhFJMb0UyYCGBrO" , "Zzo8mOInHv6WNugrM" , "wGhxuQDypr8a7CSXs" , "6AkKhLyn4Zf3aINBU" , "vHhfke8OdM6YRDatN" , "ZH28kRIYVgU3umdbr" , "XeYT2WxoUzLRPZEl4" , "J8YW3aEM9rsxgVnkI" , "vn0ABx12N3UGrJmI6" , "xYzui8EgAZFIwLdNm" , "ukxQRmsJGzA2TrgwK" , "413z5SqcyEpHOLdDM" , "cn2gNBxlTCsHpdou6" , "iHkqCrx7G06QZVD8f" , "savQpbKM2NixtgYne" , "vPBQhWOeFuD8m42Nn" , "AFoDqWv6nEhI7jOdC" , "tr1RH6lCdmZEKgU30" , "hd6M4ZOVbpvR8I5gQ" , "ubEFUAeNk4t3gOWvQ" , "qHYt0CIeMASy9bPhu" , "bqWxekOlU3XFKSsAf" , "Qqc9TDeunBAmPRWVs" , "ITWjYnkCPXKAsw75D" , "2UlLk0COHVMDZJKfs" , "K9kUz7CFLucNdGJbw" , "cTWsrvliEANtd4DyR" , "yeamb9HuIk3S1AlRj" , "v21KEN60QYCursAR7" , "1ySoQs08K2fwOcPlx" , "uzULgNSqOc5bCmIED" , "s2ARcy6p1dNY0v8FG" , "K8OW4nJ2ciFa19Bdf" , "bIKd7Ek9nZDmHzVwS" , "zfvPRgFrHD9k8dy4i" , "ontjCK20MarQJcGp8" , "vEjrNVHboOdUt2Ixa" , "18DTLw02pPsQFurWv" , "KN8OHX0QUZC3wIcMb" , "2XdYyDcRMCWmSbJes" , "Fv1kPA4Se3w5dT2Wt" , "LUumIjS9xHWKeO2NM" , "VmyGZdFc5YWtuLha1" , "HhxquXVBjkpzDFy9Z" , "R80sg14hrwiI2HntU" , "yIkUEZReQtT3OKWx2" , "ks1tCeudRl0JIEvyb" , "sC4Y5rZAtkXQRO7TF" , "MfiwluCrBpGDj0n5k" , "djOJE1RHTD0YmSMWt" , "9LJ7Kj0g3SfdGzY4Z" , "hMz4VPGbmBnFaKxdC" , "SXNuvy9ROeU4YIPDk" , "evan9xCLJcFPlQp21" , "KOxDXGNlTqhCV47ni" , "06DyH3XxRCrAcmY1E" , "Rc49dFvbkWG0EIVSh" , "CBxagSRI5Y7zGAQmK" , "826FL1TPtxSGqbpMj" , "oFWsGgy7iM2SJEcZx" , "wqopmJt2czusrfIQX" , "b3hCMGdAPrzv61Hkf" , "GmwnLI4hjPsaHFVc7" , "vwou7ciypxHKSDnWT" , "kROI1P4xX8wmHjMCr" , "3AeUujmDRlgpsLok1" , "0cGJMZWUIHSbkrQXq" , "YmrlHz06EIAR1fXQ9" , "9lPCgUQ6jIdZX2pyJ" , "hTeEbdRVn3BaClYiP" , "LSERw42OXelqyg51M" , "DBFimgWSeOCcAoUX3" , "bOwWl6KPBoyUtLMGA" , "J98ijo74C1Rbnt5Df" , "tFDxgBRcTvb4aJhn9" , "xj1qgrlYmMFuo2Ltv" , "TAIctd41Bq7elLjhp" , "eiJo7wlXQbntCNk5R" , "1GtZ4qKF5vO7bCVkR" , "4S6LyAfKBiWwTNgF8" , "UdMTb6GCetKsyag4j" , "YEo2zuBlGyN6P5HQU" , "8iIOuR45BrGDcYofj" , "SpVKZ2r50cTU9fEse" , "IDExjefHAGFbW81U0" , "Nxz19wU62PYGoXFZL" , "K7DpdrmT0gNw53HB1" , "LNFsn5QilCAMfYtRK" , "dCQoyHbWkJ1lNx3Rg" , "WthnpkxVNFXAKHzfl" , "8yq0RLjCkcbw3Xnid" , "mCjQIrTbeyZahU8ql" , "FqUne5uBMYWvOmj79" , "24XzGloQsTOkEDLtr" , "r7H18miWfp9PaSnhw" , "M5RisH96XSLprhUbD" , "IfiDFvkySEGgTdVsA" , "lBysDWVXSTKFeb2Yx" , "Pn97jfFiEpXr012Rs" , "4JCLs0TAang63ZyE5" , "WPy5EFerSQHVux2Xt" , "ghFGdzpQIj0qBAXKc" , "RtrjvpX0zxAY6NkDO" , "Tf7jXkUwRmn8zHcAe" , "J7BY4yvZlkTGNmEja" , "BcvmrC8ASnEuJhyKZ" , "GKVFpj8vWgfI91QOs" , "lip72wEob083mxFnH" , "VNlXPAU5YsaBCjZbh" , "jmsUf52QgVp8HLrYy" , "6YjUJ0ndR31ybMoAs" , "ycACmZMR56HgsU9u1" , "fe9a7HICAQlz8RvqL" , "Ufal9MLDWmXYIzkxu" , "yH8laLMEmWo5c4dQ6" , "1Hb2UxPvAB3fdygrI" , "5pxAsYi0jmXf6oOhF" , "4hmIjcdTuQJpUs0k6" , "qoyrcXa8sE3pjGeM9" , "VHrIlaYTB17hJK2Sk" , "c8otgGlHYqAikbzJd" , "zpx0TrU57SvPuVAYy" , "srZcq24RpTu6BdOtJ" , "uQfCdW9RIDUpcwSs7" , "3OwMrUpBzfQFeC6Tk" , "vtZCwlP5uGXzi0m7f" , "EbJtvsUTpwalQVhu6" , "Yjsaq0PwLHxg8EkZN" , "qwvbFl9BitjWNzfEL" , "v1QU5n39fryLpiTMw" , "yJ1Pn6SxVA9rFYswk" , "qjz6wD7R14nlZ5mrd" , "UghA9Z4fvt32Giq8b" , "asur4w9T8FgnpDvhx" , "wlv9GPWhCpjgSA01t" , "FKi9Xb1uoRQtIW7wn" , "Maged0GAOs9SJpPwn" , "AXv8rpUyl9nZY2c0f" , "7EVUvqukZyBXTerKs" , "yXCBbcHaq7snM894P" , "MZCJgARxV7ItO0qy6" , "7mE3aLXnesOWvVi9x" , "TfjDiuLBbAq536haR" , "Ui6LlPfrKZzvE4jxb" , "VYA8p1fegP5D9SOU6" , "RiH08qo1kVs9hBZMS" , "UOR5LHFtCKf8quTma" , "4sUm2WFqa9V5zefTG" , "y5aEFoRuVLCG1MHUY" , "1c7IMEPZvyAwVOfRu" , "H9khSng3lQ1x8YGN0" , "UWSbYMZNILqCDVyOR" , "ciIfWqzgeGsOutACw" , "A8mOPr5BS9jeZg7qy" , "l2h3QrdAcY0sTKGkX" , "dP30zSoLtxmlFuCyI" , "40V7oP6uvsGejbkOp" , "sUT4rFgKz9SxRobE1" , "qUD0kAKE3NR6jw7rC" , "E78WNvoD40fpHZMFJ" , "qMUpdbkeTPRhlXYNr" , "32YvH71neS8Pca5x0" , "L7RYukidtfjKaxUX2" , "taeXdBk4hLOQmf83I" , "dsZKtAPVHfzhq8eNJ" , "ESZY7fdUmrecvXyzF" , "uLiD6cHqzRAkNGVWe" , "tuXo98zaHTQDqM425" , "7qsOyuGRImUM06dJh" , "7eEqmMcDOBN5Apity" , "B8DwgosldnqKYyWiv" , "J96STut4zMdRm2HBZ" , "ptn9GczqmQjvUdrgS" , "QakjvFuDOTdImtxXz" , "sHKbyE1WGBh8UxLlc" , "IX5qMV7Q8pxWyLegf" , "8opE7x41BQy3wvDVm" , "iqhAfyQtdskP3gnVU" , "pswmfLDe2rVbCEhMX" , "TzPDoqfrh3UFWLvu7" , "4nHWkpfhDUl68Z9Fw" , "LA8erTGbv356HKXdf" , "aQbHMx8qtwCV34Ro5" , "nA9JzI0xku4oE32eF" , "0ArCJXTmoRLpizMxh" , "h3z07bQsSXK69DLAW" , "jcO3wbirYuhBKQzxg" , "nqj4wXHIPKEWMF9iC" , "83oMwUhQWeNCmOpzb" , "mtkjGF0eviYWM4l8B" , "kGlOV3ADM9yUspRuW" , "ijm2BhbNFyuDfvJ4z" , "dTwQJPav1sNmCcjye" , "Tf1kXIulqPUy5eZHj" , "SqbdonTeZvBHcaQsI" , "CL2flKm7V5aHFbBuZ" , "mXl3oGQ7bjRvMd4WZ" , "qgxFnj1LQyO4ZNzK8" , "ZkgGnb14CmXJpfcwQ" , "ibe4OyF10H7KoauE5" , "TGZSUbhzyntNMm8gp" , "RitOylL4KCsbEjWqI" , "FKqsh3w8b9lkYeaDU" , "yzZxwJIt2b4OQnGLC" , "Y5UpIlNVbC9t4RZ6K" , "acTztUVWMleoZgFRi" , "jqsiElJu1pI2QMe8F" , "JBlDEWTNkVCyAP9oU" , "zUnIBf8jlYZ4oqwDd" , "eGmJlK8SHqYLPjNwc" , "G8XJjqmdcfpPILyN7" , "jrDMbN2wa7vBQWZE1" , "vmyGjICKMFwHUg9On" , "cgoj4BuwxErW71f8A" , "6gJ12LUuH7OwtvSso" , "h5PbtH1DNlQ6mZreg" , "UqakD1P8nf9cxwBlo" , "B7QnciroHIEDuVw9X" , "8IlyiSWmEa4AbHsM3" , "BqaNH7PZuDbmSh9wI" , "1MHolApdV7CbWOPg8" , "BqeoY61i7tzWu0lCy" , "hoWJFypElKOcwkLs6" , "vufeId516JiFmlETH" , "3FNS7TYp98hM6L0uC" , "adHzLVAjYOvcngxDT" , "v2XcKyjFnrlQzhGux" , "zBtmGNoeC1d7x6f9r" , "TOvc4fdCP5oUhbe7X" , "7IS2W0kebltTrCNoJ" , "rlmev4wAJk2BiapfF" , "jvpQhRc4ZBIJe6DUO" , "ZJoj6Ne09SBXPOTCA" , "orSiWLqKdN3Of8pQR" , "lDToGN0Fnc7jhxQiq" , "iYvzs2Q6f9VCMRjL1" , "Tm6QZK05iz4sB7Le8" , "Yb7AfcxH6mjt1diRN" , "OXLvI6uyeKYkl9SCz" , "X6OeT5EYB8LxjbkfZ" , "eW31oh9s6lCVEaYP0" , "ze4XLyo7lbNShEP8a" , "ShEarjbB0pLwN2zAy" , "tVZpQAdu9yOfb6JKh" , "qTRHvYwDy7sokafbE" , "hTb0YtNwk9Fq43Hec" , "V1ulCatfjmdPDwHOI" , "2FSfUgiZp8ylnWIcH" , "AXvpb3aQOPEFZqNtW" , "DlCF7nzBtdMOH4PsL" , "8w21d6LgiReqpTGvQ" , "Ap3ZKvo7Ykr1ReCbD" , "SmcpwdR0rOFBAsYIt" , "dnfaTpXqKDZItF8ku" , "bHyi06nGQKfCYcl3a" , "RVndWSJBZhkj2OvQ7" , "d5MzRZ0ycm2f3jYkq" , "StcNLkT9DfbvX6MiY" , "vB9yb4RoCrgLYTSG1" , "efWJY9mzNDkrnL1UX" , "odtGR7YTZyJKxe2aX" , "AHSGjK70UgXLF2kzW" , "q31LihyPa6Xr4Wg8o" , "rDg5LtCud7ENKQ9FT" , "iUcDTGBnsQ5IqP1MC" , "GLiN34MFHDQkdJWrA" , "10aNFleEDVv3CmWZg" , "lXs5bEAPUwFkJ419h"];
				  
				  	if(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['fphone']) && !empty($_POST['fphone']) ) {
    					$_SESSION['fname'] = $_POST['fname'];
						$_SESSION['fphone'] = $_POST['fphone'];
					}
					$returning = false;
					if(isset($_SESSION['fname']) && isset($_SESSION['fphone'])) {
    					$user = $_SESSION['fname'];
						$phone = $_SESSION['fphone'];
    					$returning = true;
					} else {
  						$user = '';
						$phone='';
    					$returning = false;
					}
				
				  	
					$f= $_SERVER["REQUEST_URI"];
					$r=str_split($f);
					$r=array_slice($r,10);
					$m='';
					for ($i=1; $i <=17 ; $i++) {
						$m.=$r[$i];
					}
				  	
			if($_SESSION["posted"]==$m){
						echo "<div style=\"color:#27ae60;line-height: 33px;font-size: 17px;\"> شما قبلا کد <span style=\"color: #2ecc71;\">($m)</span> را برای قرعه‌کشی ثبت کرده اید، </br> همچنین می توانید با خرید کتاب های زیر شانس خود را در قرعه‌کشی چندین برابر کنید</div></br></br>";     
								$mande=(32-date("d"));
								echo "<div style=\"font-size: 27px; color:#27ae60;\"> $mande روز مانده تا قرعه‌کشی</div>";

				
								echo "<div style=\"color: #27ae60; padding-top: 61px; font-size:12px;\">کتابهای مورد علاقه‌تان را انتخاب کرده و دکمه خرید کتاب را بفشارید</div>";
				?>
								<form method="post">
					
				<div style="background-color: #cae6ff; width: 255px; font-size: 14px; color: #337ab7;border: 1px dashed #337ab7; margin: 17px auto; margin-bottom: 1px;height: 84px;padding-top: 12px; border-radius: 20px 20px 0 0;">
					<label style="cursor: pointer;" class="container"> کتاب ماشین محتوا <input style=" " type="checkbox" name="machine" value="content-machine"></br></br>
				
						<a style="color: #00539d; font-size: 11px;" href="https://noorando.com/content-machine/" target="_blank">(توضیحات کتاب) فقط 20.000 تومان</a>
				</div>
					
				<div style="width: 255px; height: 84px; margin: 0 auto;border: 1px dashed #337ab7; color: #337ab7; background-color: #cae6ff; padding-top: 12px; font-size: 14px;">
					<label style="cursor: pointer;" class="container"> کتاب خلق یا نفرت <input  style=" " type="checkbox" name="create" value="create-or-hate"></br></br>
					<a style="color: #00539d; font-size: 11px;" href="https://noorando.com/create-or-hate/" target="_blank">(توضیحات کتاب) فقط 12.000 تومان</a>
				</div>	
					
				<div style="width: 255px; height: 84px;margin: 2px auto; font-size: 14px; padding-top: 12px; border: 1px dashed #337ab7; background-color: #cae6ff; color: #337ab7;     border-radius: 0 0 20px 20px; margin-bottom: 37px; ">
					 <label style="cursor: pointer;" class="container"> کتاب بازاریابی هکر رشد <input  style=" " type="checkbox" name="hacker" value="growth-hacker-marketing" ><br><br>
						
					<a style="color: #00539d; font-size: 11px;" href="https://noorando.com/growth-hacker-marketing/" target="_blank">(توضیحات کتاب) فقط 13.000 تومان</a>
				</div>	


					<input  style="border-radius: 21px;border: none;height: 38px;margin-top: -33px; font-size: 18px;color: #fff;background-color: #358bc6;width: 186px;"  type="submit" value="خرید کتاب">
					
					<?php
				
					echo "<div style=\"padding-top: 24px;\">اعلام نتایج قرعه کشی در کانال کانون ترجمان <a href=\"https://t.me/tarjomanclub\">@tarjomanclub</a></div>";
				
				if((isset($_POST['machine']) && !empty($_POST['machine'])) || (isset($_POST['create']) && !empty($_POST['create']))  || (isset($_POST['hacker']) && !empty($_POST['hacker'])) ){
					

						if(isset($_POST['hacker']) && isset($_POST['create']) &&  isset($_POST['machine'])){Redirect("http://bit.ly/2uOBFmS");}
						
						if(isset($_POST['machine']) && isset($_POST['create'])){Redirect("http://bit.ly/2OhEKnP");}
						if(isset($_POST['machine']) && isset($_POST['hacker'])){Redirect("http://bit.ly/2mGWPz0");}
						if(isset($_POST['hacker']) && isset($_POST['create'])){Redirect("http://bit.ly/2AdG73Z");}
						if(isset($_POST['machine'])){Redirect("http://bit.ly/2LplfvQ");}
						if(isset($_POST['create'])){Redirect("http://bit.ly/2OjQiXN");}
						if(isset($_POST['hacker'])){Redirect("http://bit.ly/2LQEaf3");}
						
				
					}
					?>
	 			</form>
			
			<?php
											
											
						
			}else{

				  	if (array_search($m, $listrand) !== False) {
						$h=array_search($m, $listrand);
						
							echo "<img style=\"width: 364px;  margin-right: -17px; margin-top: -58px;\"  src=\"https://noorando.com/wp-content/uploads/2018/07/Fidibo.png\">";
						
								
							echo "<div style=\"color: #27ae60; font-size: 14px;padding-right: 5%;padding-left: 5%; margin-bottom: 48px; margin-top: -34px;\" >جایزه ویژه قرعه‌کشی کانون ترجمان ویژه نمایشگاه الکامپ استارز 97
یک دستگاه کتاب‌خواب دیجیتال 😍</div>";	
	
						
						
						echo "<div style=\"color: #348bc6; font-size: 16px; line-height: 33px; padding-left: 6%;  padding-right: 6%;\">"."برای شرکت در قرعه کشی اطلاعات خود را در قسمت زیر وارد کرده و گزینه ثبت را بزنید."."</div>";

						
			

						
						echo '<form method="post">';
							echo '<input style="border: 1px dashed #348bc6;color: #348bc6; height: 41px; margin-top: 58px; width:309px; text-align: center; border-radius: 20px;" type="text" name="fname"  placeholder="نام و نام خانوادگی (ضروری)" required></br></br>';
						
						echo '<input style="border: 1px dashed #348bc6;color: #348bc6; height: 41px; margin-top: -6px;margin-bottom: 9px; width: 309px; text-align: center; border-radius: 20px;" type="number" name="fphone"  placeholder="شماره همراه (ضروری)" required></br></br>';
						
								
						echo '<input style="border-radius: 21px;border: none;height: 38px;margin-top: -33px; font-size: 18px;color: #fff;background-color: #358bc6;width: 186px;" type="submit" value="ثبت">';
							
						echo "<div style=\"padding-top: 24px;\">اعلام نتایج قرعه کشی در کانال کانون ترجمان <a href=\"https://t.me/tarjomanclub\">@tarjomanclub</a></div>";
						
						if(isset($_POST['fname']) && !empty($_SESSION['fname']) && trim($_POST['fname']) && isset($_POST['fphone']) && !empty($_SESSION['fphone']) && trim($_POST['fphone'])){
							
							echo "<input type=\"hidden\" name=\"redirect\" value=\"7ffp1slh3hontkoyn/\">";
							
							$lines = 0;
							if ($fh = fopen('/home/noorando/public_html/asami/natayej.txt', 'r')) {
 								 while (!feof($fh)) {
    								if (fgets($fh)) {
      									$lines++;
    								}
  								}
							}
							$lines=($lines+1);
							file_put_contents('/home/noorando/public_html/asami/natayej.txt', "  $lines   -->  $phone  -->  $user  -->  $m\r\n", FILE_APPEND);
							unset($_SESSION['fname']);
							unset($_SESSION['fphone']);
							$_SESSION["posted"]=$m;
						 	Redirect("https://noorando.com/7ffp1slh3hontkoyn/");
						}
						
						
						echo '</form>';
						

						
					}else{
						echo "<div style=\"color: #c0392b; font-size: 34px; line-height: 60px; margin-top: 98px;\">
						کد قرعه کشی نامعتبره ☹️
						</div>";

					}

			}
				?>

			</div

        </div>
    </div>
</div>
<?php
}
get_footer();