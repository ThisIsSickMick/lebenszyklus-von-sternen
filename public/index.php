<html>
  <head>
    <title>Ergebnis</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
      body{
        font-family: "Roboto";
      }
      table{
        border-collapse: collapse;
        margin-bottom: 20px;
      }
      td, th{
        padding: 5px 10px 5px 10px;
      }
      #content{
        margin: 40px 15vw 0 15vw;
      }
      h3{
        color: #3C74BD;
      }
      a{
        text-decoration: none;
        color: #3C74BD;
        border: 2px solid #3C74BD;
        border-radius: 5px;
        padding: 5px 10px 5px 10px;
        transition: .3s;
      }
      a:hover{
        background-color: #3C74BD;
        color: white;
      }
    </style>
  </head>
  <body>
    <div id="content">
      <?php
        include('functions/Masse-Beziehungen.inc');
        include('functions/In-Masse-Beziehungen.inc');
        include('functions/Verweildauer.inc');
        include('functions/Jeans-Masse.inc');
        include('functions/Freifallzeit.inc');
        include('functions/sl_m.inc');
        include('functions/sl_sr.inc');
        include('functions/Akkretion.inc');
        include('functions/KelvinHelmholtzZeit.inc');
        include('functions/Leuchtkraft.inc');
        include('functions/EffektiveTemperatur_Stern.inc');
        

        // Ausgabe Jeans-Masse:
        if(isset($_POST["rho"])){
          $rho = $_POST["rho"];
          $temperatur = $_POST["T"];

          $jeans_masse = JeansMasse($rho, $temperatur);
          $jeans_masse2 = $jeans_masse/(1.989e30);
          echo "<h3>Ergebnis Jeans-Masse</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>Jeans Masse</th>
            <td>".$jeans_masse."<br/>".$jeans_masse2."</td>
            <td>kg<br/>Sonnenmassen</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";
          
          echo "<br><br><br><br><h3>Erklärung Jeans-Masse</h3>
          <h4>Herleitung</h4>
          Eines der von James Jeans aufgestellten Bedingungen für das instabil werden einer Molekülwolke ist die Jeans-Masse. 
          Herleiten kann man sich die Jeans-Masse zum Beispiel über den Gleichgewichtsdruck, 
          der sich im Zentrum der Molekülwolke befindet. Dabei gilt:
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_1.jpg'></p><br>
          Das Gas kann unter den herrschenden Bedingungen mit dem Gesetz der idealen Gasgleichung beschrieben werden: 
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_2.jpg'></p><br>
          Umgestellt bekommt man den Gasdruck:
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_3.jpg'></p><br>
          Der Gravitationsdruck innerhalb einer konzentrischen Kugel im Zentrum eines Himmelskörpers 
          (in unserem Beispiel innerhalb der Molekülwolke) wird mit der folgenden Formel beschrieben:
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_4.jpg'></p><br>
          Beide Formeln werden wie oben gleichgesetzt: 
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_5.jpg'></p><br>
          <h4>Formel</h4>
          Durch das Umstellen der Gleichung nach M kommt man auf die Formel der Jeans-Masse:
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_6.jpg'></p>
          <p style='text-align: right'>ρ…Dichte der Molekülwolke<br>
          kB…Boltzmann-Konstante<br>
          T…Temperatur der Molekülwolke<br>
          G…Gravitationskonstante<br></p>
          <br><br>
          mittleren Masse eines Gasmoleküls (m):
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_9.jpg'></p>
          <p style='text-align: right'>μ…mittlere molekulare Masse (μ ≈ 2,3)<br>
          m_p…Masse eines Protons
          <br></p><br><br>
          <h4>Bedeutung</h4>
          Die Jeans-Masse beschreibt die kleinstmögliche Masse der Molekülwolke, um zu kollabieren. Es gilt also die Bedingung:
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_7.jpg'></p>
          <p style='text-align: right'>M_MW…Masse der Molekülwolke<br><br><br></p>
          damit die Molekülwolke instabil wird und kollabieren kann. <br><br><br>
          Die Jeans-Masse ist nur von Temperatur und Dichte der Molekülwolke abhängig, 
          da die restlichen Größen in der Formel für die Jeans-Masse Konstanten sind (k, G, m). 
          Diese Korrelation zwischen den drei Größen Masse, Temperatur und Dichte kann man auch im folgenden Diagramm erkennen.
          <br><p style='text-align: center'><img src='Bilder/Jeans-Masse_8.jpg'></p><br><br><br>
          ";
        }

        // Ausgabe Freifallzeit:
        if (isset($_POST["rho2"])){
          $rho2 = $_POST["rho2"];

          $freifallzeit = Freifallzeit($rho2);
          echo "<h3>Ergebnis Freifallzeit</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>Freifallzeit</th>
            <td>".$freifallzeit."</td>
            <td>Sekunden</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";

          echo "<br><br><br><br><h3>Erklärung Freifallzeit</h3>
          <h4>Erster dynamischer Kollaps</h4>
          Ist das Jeans-Kriterium erfüllt, so ist die kritische Masse für einen Kollaps der Gas-, Stauboder Molekülwolke überschritten.
          Folglich kollabiert die Molekülwolke dynamisch d.h gewissermaßen im freien Fall. Daher auch der Name der ersten Phase der
          Sternenentstehung: Erster dynamischer Kollaps.
          <br>
          <br><p style='text-align: center'><img src='Bilder/Freifallzeit_1.jpg'></p>
          <p style='text-align: center'>Abb.: Die vier Phasen der Sternentstehung in Abhängigkeit von Temperatur und Dichte.</p>
          <br><br><br>
          Ergebnis des ersten dynamischen Kollapses ist das Bilden eines Kerns im Zentrum der Wolke,
          welcher etwa 0,5 Prozent der insgesamten Masse der Wolke besitzt. Der Kern ist dichter als
          die äußeren Hüllen um den Kern, was ihn optisch dicht für Licht im infraroten Bereich macht.
          Außerdem herrscht in ihm eine Temperatur von circa 500 K und eine Teilchendichte von nicht
          ganz 1e12 cm^-3.
          <br><br>
          <h4>Formel</h4>
          Die Zeit, welche während der Phase des dynamischen Kollapses anfällt, wird durch die
          sogenannte Freifallzeit bestimmt:
          <p style='text-align: center'><img src='Bilder/Freifallzeit_2.jpg'></p>
          <p style='text-align: right'>ρ…Dichte der Molekülwolke</p>
          <br><br>
          ";
        }

        // Ausgabe Massezuwachsrate + Leuchtkraft und Geschwindigkeit der Akkretion + Effektive Temperatur des Protosterns:
        if (isset($_POST["Ms"])){
          $Ms = $_POST["Ms"];
          $Rs = $_POST["Rs"];
          $Ts = $_POST["Ts"];

          $Mzw = Massezuwachsrate($Ts);
          $lacc = Lacc($Ms, $Rs, $Mzw);
          $vff = vff($Ms, $Rs);
          $efftemp = EffektiveTemperatur($Ms, $Mzw, $Rs);

          echo "<h3>Ergebnis Massezuwachsrate + Leuchtkraft und Akkretionsgeschwindigkeit + Effektive Temperatur</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>Massezuwachsrate</th>
            <td>".$Mzw."</td>
            <td>kg/s</td>
            </tr>
            <tr>
            <th>Leuchtkraft der Akkretion</th>
            <td>".$lacc."</td>
            <td>Watt</td>
            </tr>
            <tr>
            <th>Geschw. der Akkretion</th>
            <td>".$vff."</td>
            <td>Sekunden</td>
            </tr>
            <tr>
            <th>Effektive Temperatur</th>
            <td>".$efftemp."</td>
            <td>Kelvin</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";

          echo "<br><br><br><br><h3>Erklärung Leuchtkraft und Akkretionsgeschwindigkeit + Effektive Temperatur</h3>
          <h4>Quasistatische Phase</h4>
          Die zweite Phase der Sternenentstehung wird als erste quasistatische Phase bezeichnet. In
          dieser Zeit erhitzt sich überwiegend das Gas im Kern der Wolke von anfangs 500 Kelvin auf
          etwa 10^3 Kelvin, was dazu führt, dass der von der höheren Temperatur ausgehende
          Strahlungsdruck größer wird und gegen den Gravitationsdruck anhält. Infolgedessen erfolgt
          die Kontraktion der Wolke langsamer als in der ersten Phase der Sternenentstehung, nun
          jedoch adiabatisch d.h. ohne eine Energieabgabe nach außerhalb der Wolke. Das ist der
          Grund für den großen Anstieg der Temperatur im inneren der Wolke, da es durch keine
          Energieabgabe nach außen zu einem Wärmestau kommt.
          In der folgenden Phase erhitzt sich der Kern weiter, ab einer Temperatur von ca. 1800 Kelvin
          beginnt jedoch die Dissoziation der Wasserstoffmoleküle (H2) d.h. die Wasserstoffmoleküle
          werden instabil und zerfallen in jeweils zwei nicht gebundene Wasserstoffatome:
          <br>
          <p style='text-align: center'><img src='Bilder/Akkretion_1.jpg'></p>
          <br>
          <h4>Zweiter dynamischer Kollaps</h4>
          Wenn eine Temperatur von 10^4 Kelvin erreicht ist, werden diese Wasserstoffatome sogar
          ionisiert. „Da diese Prozesse viel Energie verbrauchen, steigen in dieser Phase Druck und
          Temperatur nicht an, sodass der Stern nochmals dynamisch kollabieren kann.“ In der Phase
          des zweiten dynamischen Kollapses bildet sich aus dem Kern der Molekülwolke ein
          Protostern. Folglich wird die kollabierte Wolke von nun an als protostellares Objekt bezeichnet.
          Durch den Kollaps kommt es zur Masseaufnahme durch eine Akkretionsscheibe (siehe Abb.
          16) aus der der Protostern seine Energie bezieht. Die physikalischen Eigenschaften der
          Akkretionsscheibe näher zu erläutern würde den Rahmen dieser wissenschaftlichen Arbeit 
          überziehen. Wichtig ist dennoch zu wissen: In und um die Akkretionsscheibe wirken Kräfte wie
          die Zentrifugalkraft, die Reibung zwischen den Teilchen und das Magnetfeld und die
          Schwerkraft des Protosterns, welche die Akkretionsscheibe aufrechterhalten. Das Gas wird
          folglich nur über diesen Weg im Protostern aufgenommen (siehe Abb. 16, Klasse 0). Der
          Protostern gewinnt so an Masse, während die Akkretionsscheibe um den Protostern immer
          dünner wird.
          <br><br><br>
          <h4>Leuchtkraft</h4>
          Die Leuchtkraft der Akkretion, welche bei protostellaren Objekten etwa die
          Gesamtstrahlungsleistung dieser beschreibt, kann durch:
          <br>
          <p style='text-align: center'><img src='Bilder/Akkretion_2.jpg'></p>
          <p style='text-align: right'>L_acc…Leuchtkraft der Akkretion          <br>
          M_Stern…Masse des Protosterns
          <br>
          R_Stern…Radius des Protosterns </p>
          und mit der Massezuwachsrate des Protosterns: 
          <p style='text-align: center'><img src='Bilder/Akkretion_3.jpg'></p>
          <p style='text-align: right'>c_s...Schallgeschwindigkeit im idealen Gas (siehe S.27)</p>
          berechnet werden.
          <br><br>
          <p style='text-align: center'><img src='Bilder/Akkretion_4.jpg'></p>
          <br>
          <p style='text-align: center'>Abb.: Die Entwicklungsstufen von jungen, massearmen stellaren Objekten in vier Klassen bzw. Phasen unterteilt (nach P. André, 1994).</p>
          <br><br><br>
          <h4>Effektive Temperatur</h4>
          Da der Protostern wie ein Schwarzer Körper strahlt, kann man seine effektive Temperatur mit Hilfe des Stefan-Boltzmann-Gesetz für Schwarze Strahler ausrechnen:
          <br>
          <p style='text-align: center'><img src='Bilder/Akkretion_6.jpg'></p>
          <p style='text-align: right'>P…Strahlungsleistung<br>
          A…Fläche des Körpers<br>
          T…Temperatur<br></p>
          <br>
          Stefan-Boltzmann-Konstante σ_B:
          <br>
          <p style='text-align: center'><img src='Bilder/Akkretion_7.jpg'></p>
          <p style='text-align: right'>h…Planck’sches Wirkungsquantum<br>
          c…Lichtgeschwindigkeit (c ≈ 3 x 106 km/s)<br>
          k_B…Boltzmann-Konstante</p>
          <br><br><br><br>
          Wie oben beschrieben ist Lacc ≈ L (bei protostellaren Objekten). Der Protostern kann zudem als kugelförmig angenommen werden, was heißt: A = 4π. 
          Umgeformt lautet das Stefan-Boltzmann-Gesetz also:
          <p style='text-align: center'><img src='Bilder/Akkretion_8.jpg'></p>
          Stellt man nun auf Teff um, erhält man:
          <p style='text-align: center'><img src='Bilder/Akkretion_9.jpg'></p>
          <p style='text-align: right'>M_Stern…Masse des Protosterns<br>
          R_Stern…Radius des Protosterns</p> 
          <br><br><br>
          <h4>Akkretionsgeschwindigkeit</h4>
          Die Akkretionsgeschwindigkeit, mit der das Gas während der Gasaufnahme des Protosterns
          auf diesen fällt, kann etwa mit:
          <br>
          <p style='text-align: center'><img src='Bilder/Akkretion_5.jpg'></p>
          beschrieben werden.
          <br><br><br>
          Wenn diese die Schallgeschwindigkeit überschreitet, kommt es zum Akkretionsschock und die Gasdichte und Temperatur steigen plötzlich stark an.  
          Nach dem Akkretionsschock hat der Protostern im Inneren eine Temperatur von etwa 106 Kelvin erreicht, 
          was noch nicht ganz für das Entzünden des Wasserstoffbrennens reicht. 
          <br><br><br><br>
          ";
        }

        //Ausgabe Kelvin-Helmholtz-Zeit:
        if (isset($_POST["Lp"])){
          $Lp = $_POST["Lp"];
          $Mp2 = $_POST["Mp2"];
          $Rp2 = $_POST["Rp2"];

          $tKH = KelvinHelmholtzZeit($Lp, $Mp2, $Rp2);
          echo "<h3>Ergebnis Kelvin-Helmholtz-Zeit</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>Kelvin-Helmholtz-Zeit</th>
            <td>".$tKH."</td>
            <td>Sekunden</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";

          echo "<br><br><br><br><h3>Erklärung Kelvin-Helmholtz-Zeit</h3>
          <h4>Zweite quasistatische Phase</h4>
          Nach dem zweiten dynamischen Kollaps befindet sich das ionisierte Gas (Plasma) wieder (mehr oder weniger) im hydrostatischen Gleichgewicht, der Stern ist also nicht mehr instabil. 
          Die vierte Phase der Sternenentwicklung heißt daher zweite quasistatische Phase. Die „main accretion phase“ ist beendet, da den Protostern nur noch wenig diffuses Gas umhüllt. 
          Diese Hülle aus Gas wird nun abgeblasen und damit ist gleichzeitig die finale Masse fast erreicht. 
          Da das Gas im Protostern noch nicht Dicht genug ist und das protostellare Objekt folglich noch eine relativ große Ausdehnung besitzt (R ≫ R⨀), hat der Protostern eine hohe Leuchtkraft. 
          Beziehen tut der Stern seine Energie deswegen aus der Gravitationsenergie (auch potentielle Energie genannt), welche durch Kelvin-Helmholtz-Kontraktion entsteht. 
          <br><br>
          <h4>Herleitung und Formel</h4>
          Für die Gravitationsenergie gilt nach Newtons Gravitationsgesetz:
          <p style='text-align: center'><img src='Bilder/K-H-Z_1.jpg'></p>
          <br>
          Die Zeitdauer, die ein Stern ohne innere Energiequelle seine Strahlungsverluste allein durch die Gravitationsenergie decken kann, beschreibt die Kelvin-Helmholtz-Zeit.  
          Die Formel für die Kelvin-Helmholtz-Zeit ist:
          <p style='text-align: center'><img src='Bilder/K-H-Z_2.jpg'></p>
          <br>
          Setzt man nun Epot in die Gleichung ein, so erhält man die endgültige Gleichung der Kelvin-Helmholtz-Zeit:
          <p style='text-align: center'><img src='Bilder/K-H-Z_3.jpg'></p>
          <br>
          <h4>Bedeutung</h4>
          Die Kelvin-Helmholtz-Zeit beschreibt die maximale Zeit, die ein Protostern dafür braucht, während der Kelvin-Helmholtz-Kontraktion auf dem Herzsprung-Russel-Diagramm zur Hauptreihe zu gelangen. 
          Während der Kelvin-Helmholtz-Kontraktion nutzt der Stern die Energie die bei der Kontraktion des Sterns entsteht. 
          Dieser reicht jedoch nicht völlig für das hydrostatische Gleichgewicht aus, weswegen der Kern, und somit der gesamte Protostern schrumpfen. 
          In der Abbildung (HRD) sieht man den Beginn der Kelvin Helmholtz-Kontraktion ab dem Punkt, an dem der Radius und die Leuchtkraft des Protosterns drastisch sinken. 
          Mit einem steigenden Druck im Kern des Protosterns wächst auch die Temperatur in diesem.
          <br><br><br><br>
          <p style='text-align: center'><img src='Bilder/K-H-Z_4.jpg' width='400' length='400'></p>
          <p style='text-align: center'>Abb.: Phase der Vor-Hauptreihensterne auf dem Hertzsprung-Russel-Diagramm</p>
          <br><br><br>
          <h4>Zündung des Wasserstoffbrennens</h4>
          Ab 15 Millionen Kelvin (Kerntemperatur) ist es im Inneren des Protosterns so heiß, dass die Wasserstoff-Atome anfangen, miteinander zu verschmelzen. Somit beginnt das Wasserstoffbrennen, was sehr viel Energie freisetzt. 
          Dies ist auch an der ansteigenden Leuchtkraft in der Abbildung (HRD) zu sehen. Da der Stern nun Wasserstoff in Helium fusioniert, also eine eigene Energiequelle besitzt, ist die Kelvin-Helmholtz-Kontraktion beendet.   
          Durch den damit verbundenen größeren Gas- und Strahlungsdruck im Stern, zieht sich dieser nicht weiter zusammen, sondern ist nun im Hydrostatischen Gleichgewicht.
          <br><br><br><br>
          Sternenentstehung in Molekülwolken mit verschiedener Dichte:
          <br>
          <p style='text-align: center'><video width='600' height='330' controls>
          <source src='Bilder/Girichidis-2011-dens-profile-comparison.mp4' type='video/mp4'>
          </video></p>
          <br><br>
          Mit der Zündung des Wasserstoffbrennens ist ein Stern auf der Hauptreihe (kurz HR) auf dem Herzsprung-Russel-Diagramm (kurz HRD) angekommen. 
          <br><br>
          <p style='text-align: center'><img src='Bilder/HR-diagramm_ESO.jpg' width='600'></p>
          <p style='text-align: center'>Abb.: Das Hertzsprung-Russel-Diagramm mit den eingezeichneten Spektralfarben der Sterne, die abhängig von der effektiven Temperatur sind</p>
          <br><br><br><br>
          Protosterne unter einer Masse von 0,08 Sonnenmassen erreichen die mindestens 15 x 10^6 Kelvin nicht, die die Wasserstoffatome brauchen um zu fusionieren. 
          Aus ihnen werden sogenannte Brauner Zwerge, die weiter schrumpfen und am Ende ihrer Kelvin-Helmholtz-Zeit erlöschen.
          <br><br><br><br>
          ";
        }

        // Ausgabe Beziehungen und Verweildauer auf der Hauptreihe:
        if(isset($_POST["ph-gr"])){
            $ph_gr = $_POST["ph-gr"];

            // Masse gegeben
            if($ph_gr == "p1"){
              $masse = $_POST['M'];
              $leuchtkraft = MasseLeuchtkraft($masse);
              $radius = MasseRadius($masse);
              $oberflaechent = MasseOberflaechent($masse);
              $teilchenmenge = Teilchenmenge($masse);
              $verweildauer = Verweildauer($masse);
            }

            // Leuchtkraft gegeben
            else if($ph_gr == "p2"){
              $leuchtkraft = $_POST['L'];
              $masse = LeuchtkraftMasse($leuchtkraft);
              $radius = MasseRadius($masse);
              $oberflaechent = MasseOberflaechent($masse);
              $teilchenmenge = Teilchenmenge($masse);
              $verweildauer = Verweildauer($masse);
            }

            // Radius gegeben
            else if($ph_gr == "p3"){
              $radius = $_POST['R'];
              $masse = RadiusMasse($radius);
              $leuchtkraft = MasseLeuchtkraft($masse);
              $oberflaechent = MasseOberflaechent($masse);
              $teilchenmenge = Teilchenmenge($masse);
              $verweildauer = Verweildauer($masse);
            }

            // Oberflächentemperatur gegeben
            else if($ph_gr == "p4"){
              $oberflaechent = $_POST['T_eff'];
              $masse = OberflaechentMasse($oberflaechent);
              $leuchtkraft = MasseLeuchtkraft($masse);
              $radius = MasseRadius($masse);
              $teilchenmenge = Teilchenmenge($masse);
              $verweildauer = Verweildauer($masse);
            }

            echo "<h3> Beziehungen zwischen Masse, Radius, Leuchtkraft und Oberflächentemperatur + Verweildauer auf der HR und Teilchenmenge (N) des Sterns</h3>
              <table border='1'>
                  <tr>
                      <th></th>
                      <th>Wert</th>
                      <th>Einheit</th>
                  </tr>
                  <tr>
                      <th>Masse</th>
                      <td>".$masse."</td>
                      <td> M_⨀ (Sonnenmassen) </td>
                  </tr>
                  <tr>
                      <th>Radius</th>
                      <td>".$radius."</td>
                      <td> R_⨀ (Sonnenradien) </td>
                  </tr>
                  <tr>
                      <th>Leuchtkraft</th>
                      <td>".$leuchtkraft."</td>
                      <td> L_⨀ (Sonnenleuchtkraft) </td>
                  </tr>
                  <tr>
                      <th>Oberflächentemperatur</th>
                      <td>".$oberflaechent."</td>
                      <td> T_eff_⨀ </td>
                  </tr>
                  <tr>
                    <th>Teilchenmenge N</th>
                    <td>".$teilchenmenge."</td>
                    <td>Teilchen</td>
                  </tr>
                  <tr>
                  <th>Verweildauer auf der HR</th>
                  <td>".$verweildauer."</td>
                  <td>Jahre</td>
                </tr>
            </table>
            <br>
            <a href='index.html'>Neue Berechnung</a>";

            echo "<br><br><br><br><h3>Erklärung</h3>
            <h4>Allgemeines</h4>
            Nach der Sternentstehung wandern alle Protosterne mit einer Masse größer als 0,08 Sonnenmassen auf die Hauptreihe des Hertzsprung-Russel-Diagramms, wo sie Wasserstoff in Helium fusionieren. 
            Wie in Kapitel 3.1 beschrieben, brauchen massereiche Sterne dafür sehr viel weniger Zeit als massearme Sterne. Ebenfalls ausschlaggebend ist die Masse eines Sterns bei der Sternenentwicklung. 
            Daher klassifiziert man Sterne auf der Hauptreihe in drei verschieden Kategorien der Masse: 
            Sterne der Leichtgewichtsklasse (M ≤ 2M_⨀), Sterne der Mittelgewichtsklasse (2 M_⨀ ≤ M ≤ 8 M_⨀) und die Schwergewichte: Massereiche Sterne (M ≥ 8 M_⨀). 
            <br><br><br>
            <h4>Fusionsprozesse versch. Sternenklassen</h4>
            <p style='text-align: center'><img src='Bilder/Diagramm-PP-CNO.jpg'></p>
            <p style='text-align: center'>Abb.: Energieerzeugung (Leuchtkraft) der p-p-Kette und des CNO-Zyklus in Abhängigkeit zur Kerntemperatur des Sterns. Der schwarze Punkt symbolisiert die Sonne.</p>
            <br><br><br>
            Sterne auf der Hauptreihe mit einer höheren Temperatur sind gleichzeitig massereicher. 
            Daraus geht einher, dass massearme Sterne (wie die Sonne) hauptsächlich Wasserstoff in Helium durch die p-p-Kette fusionieren und massereichere Sterne mit einer höheren Temperatur den für sie viel effektiveren CNO-Zyklus bevorzugen. 
            Aus dem Diagramm geht außerdem hervor: Je massereicher ein Stern ist, desto mehr Fusion kann er in einer bestimmten Zeit betreiben. 
            Dies erklärt, warum massearme Sterne sehr viel länger leben als massereiche Sterne. 
            <br><br><br>
            <h4>Herleitung und Formel</h4>
            Herleitung der Zeit, welche ein Stern auf der Hauptreihe verweilt:
            <p style='text-align: center'><img src='Bilder/Verweildauer_1.jpg'></p>
            Mit der Masse-Leuchtkraft-Beziehung:
            <p style='text-align: center'><img src='Bilder/L-M-Beziehung.jpg'></p>
            erhält man:
            <p style='text-align: center'><img src='Bilder/Verweildauer_3.jpg'></p>
            Geteilt durch t_⨀ erhält man die Zeit, welche ein Stern auf der Hauptreihe verweilt:
            <p style='text-align: center'><img src='Bilder/Verweildauer_4.jpg'></p>
            <br><p style='text-align: right'>t_⨀ ≈ 7,7 x 10^9 y</p>
            <br><br><br>
            <h4>Bedeutung und weitere Masse-Beziehungen</h4>
            Da Sterne circa 90 Prozent ihres Lebens auf der Hauptreihe zubringen, bezeichnet man diese Zeit salopp auch als Lebensdauer der Sterne.
            <br><br><br><br>
            Neben der Masse-Leuchtkraft-Beziehung gibt es auch die Masse-Radius-Beziehung und die Masse-Temperatur-Beziehung:
            <p style='text-align: center'><img src='Bilder/R-T-M-Beziehung.jpg'></p>
            <br><br><br><br>
            ";
        }

        //Ausgabe Leuchtkraft:
        if (isset($_POST["R_Stern"])){
          $R_Stern = $_POST["R_Stern"];
          $Teff_Stern = $_POST["Teff_Stern"];

          $L = Leuchtkraft($R_Stern, $Teff_Stern);
          echo "<h3>Ergebnis Leuchtkraft</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>Leuchtkraft</th>
            <td>".$L."</td>
            <td>W</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";

          echo "<br><br><br><br><h3>Erklärung</h3>
          <h4>Formeln</h4>
          <p style='text-align: center'><img src='Bilder/L-Teff.jpg'></p>
          <br><p style='text-align: right'>σ…Stefan-Bolzmann-Konstante<br>L…Leuchtkraft<br>R…Radius</p>
          <br><br><br><br>
          ";
        }

        //Ausgabe effektive Temperatur:
        if (isset($_POST["L_Stern"])){
          $L_Stern = $_POST["L_Stern"];
          $R2_Stern = $_POST["R2_Stern"];

          $efftemp = Leuchtkraft($L_Stern, $R2_Stern);
          echo "<h3>Ergebnis effektive Temperatur</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>effektive Temperatur</th>
            <td>".$efftemp."</td>
            <td>K</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";

          echo "<br><br><br><br><h3>Erklärung</h3>
          <h4>Formeln</h4>
          <p style='text-align: center'><img src='Bilder/L-Teff.jpg'></p>
          <br><p style='text-align: right'>σ…Stefan-Bolzmann-Konstante<br>L…Leuchtkraft<br>R…Radius</p>
          <br><br><br><br>
          ";
        }

        // Ausgabe Masse des Schw. Lochs:
        if (isset($_POST["a"])){
          $a = $_POST["a"];
          $tu = $_POST["tu"];

          $masseSL = MasseSL($a,$tu);
          echo "<h3>Ergebnis Masse Schw. Loch</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>Masse</th>
            <td>".$masseSL."</td>
            <td>M_⨀ (Sonnenmassen)</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";

          echo "<br><br><br><br><h3>Erklärung</h3>
          <h4>Definition</h4>
          „Als Schwarzes Loch bezeichnet die Wissenschaft ein Objekt im Universum, in der Materie in sich selbst zusammengefallen ist. Man spricht in diesem Fall von einem Gravitationskollaps, also ein Zusammenbruch durch Schwerkraft. 
          Schwarze Löcher basieren auf der Allgemeinen Relativitätstheorie von Albert Einstein.“ 
          <br><br><br>
          <p style='text-align: center'><img src='Bilder/RAPTOR-4K-1030x579.png' width='600'></p>
          <p style='text-align: center'>Abb.: Visualisierte Simulation der ersten Aufnahme eines Schw. Lochs im Sommer 2019</p>
          <br><br><br>
          <h4>Berechnung der Masse</h4>
          Entsteht aus einem massereichen Stern (M > 10 Sonnenmassen) ein Schwarzes Loch, so kann man die Masse dieses mit einer bestimmten Form des 3. Keplerschen Gesetzes bestimmten. 
          Um dies zu tun, brauch man jedoch einen Körper (z.B. ein Stern) der um das Schwarze Loch kreist.
          <p style='text-align: center'><img src='Bilder/SL-Masse.jpg'></p>
          <br><p style='text-align: right'>a...Halbachse der Umlaufbahn des Körpers um das Schwarze Loch [AE]<br> t...Umlaufzeit des Orbiters [y]</p>
          <br><br><br>
          <h4>Aufbau</h4>
          <p style='text-align: center'><img src='Bilder/aufbau-sl.jpg' width='600'></p>
          <p style='text-align: center'>Abb.: Simulation eines Schwarzen Lochs mit Akkretionsscheibe, Ereignishorizont, Materie-Jet und der nicht sichtbaren Singularität (Theorie).</p>
          <br><br><br>
          <h4>Arten</h4>
          Es gibt verschiedene Arten von Schwarzen Löchern, welche anhand ihrer Masse klassifiziert werden:
          <br><br>(1) Stellare Schwarze Löcher mit 3 bis 100 Sonnenmassen: Sie entstehen beim Tod eines Sterns mit mehr als 10 Sonnenmassen durch einen Gravitationskollaps. 
          Dabei wirft der Stern seine äußeren Hüllen ab, was als Supernova vom Typ II bezeichnet wird. 
          <br><br>(2) Mittelschwere Schwarze Löcher mit einigen hundert bis mehreren hunderttausend Sonnenmassen: 
          Sie befinden sich vor allem in Systemen wie jungen Sternhaufen, Kugelsternhaufen und Zwerggalaxien. Gefunden wurden sie durch die Bewegung der Sterne oder Galaxien in ihrer Nähe, da der gravitative Einfluss des Schwarzen Lochs auf diese Objekte wirkt und ihre Umlaufbahnen so beeinflusst. 
          <br><br>(3) Super-massereiche Schwarze Löcher: besitzt eine Masse von mehreren Millionen bis Milliarden Sonnenmassen. Sie treten nur im Zentrum einer Galaxie auf, wie z.B. das super-massereiche Schwarze Loch Sagittarius A* im Zentrum der Milchstraße. 
          Die Entstehung von super-massereichen Schwarzen Löchern ist noch unklar und viele Wissenschaftler forschen an dieser Frage, die auch „seed black hole problem“ genannt wird.
          <br><br><br><br>
          <h4>Krümmung der Raum-Zeit</h4>
          Schwarze Löcher haben eine sehr starke Gravitation mit der sie Planeten oder sogar ganze Sterne verschlingen können. Doch diese spezielle Gravitationswirkung folgt größtenteils nicht aus der Masse, die es besitzt, denn ein Schwarzes Loch hat keine größere Masse als die Materie, aus der es entstanden ist.
          Entscheidend ist die Konzentration dieser Masse auf einen extrem kleinen Punkt, welche als Singularität bezeichnet wird.
          <br><br>
          <p style='text-align: center'><img src='Bilder/singularity.jpg' width='600'></p>
          <p style='text-align: center'>Abb.: Die Krümmung der Raum-Zeit eines Schwarzen Lochs aus einer Zweidimensionalen Perspektive</p>
          <br><br>
          Kommen Objekte bzw. Körper einem Schwarzes Loch zu nahe, werden sie durch die Gravitation zuerst angezogen und ab einem bestimmten Punkt bis zum Zerreißen gedehnt. Und einmal im Schwarzen Loch gefangen, kann nichts mehr entweichen. Nicht einmal das Licht. 
          Deswegen ist ein Schwarzes Loch auch schwarz: Es kann kein Licht reflektieren. Was heißt, dass man nicht genau sagen kann, was sich hinter dem Ereignishorizont verbirgt.
          <br><br><br>
          Um der enormen Gravitation eines Schwarzen Lochs zu entkommen, müsste man schneller als das Licht sein (c ≈ 300.000.000 m/s), denn auch das wird bis zum Ereignishorizont zurückgehalten. Doch laut dem heutigen Wissensstand gibt es nichts schnelleres als die Lichtgeschwindigkeit.
          <br><br><br>
          Gleichzeitig zum Raum wird auch die Zeit gedehnt, bis sie schließlich zum Stillstand kommt. Wann genau das passiert, habe ich den Doktoranden Kianusch Mehrgan in meinem Interview gefragt:
          <br><br>„Die Zeit bleibt praktisch stehen, wenn man den Schwarzschild-Radius erreicht. Die einzige Möglichkeit, die wir haben, Zeit überhaupt zu quantifizieren, wäre wahrscheinlich in dem wir sagen würden: Wie lange braucht Licht um eine Strecke zu überqueren, da das Licht im All die gleiche Geschwindigkeit besitzt. 
          Anhand davon kann man die lokale Zeit quantifizieren. Am Schwarzschild-Radius ist die Krümmung der Raumzeit so gewaltig, dass das Licht unendlich brauchen würde um aus dem Schwarzen Loch zu entkommen. Das kommt einem dann vor, als würde es keine Zeit geben.“ (K. Mehrgan, persönliche Kommunikation (Interview), 07. Februar 2020)
          <br><br><br><br>
          <p style='text-align: center'><img src='Bilder/General_relativity_time_and_space_distortion_extract.gif' width='600'></p>
          <p style='text-align: center'>Abb.: Die Krümmung der Raum-Zeit eines Schwarzen Lochs aus einer Dreidimensionalen bzw. Vierdimensionalen Perspektive</p>
          <br><br><br><br>
          ";
        }

        // Ausgabe Schwarzschild-Radius:
        if (isset($_POST["msr"])){
          $msr = $_POST["msr"];

          $Rss = Schwarzschildradius($msr);
          echo "<h3>Ergebnis Schwarzschild-Radius</h3>
          <table border='1'>
            <tr>
              <th></th>
              <th>Wert</th>
              <th>Einheit</th>
            </tr>
            <tr>
            <th>Schwarzschild-Radius</th>
            <td>".$Rss."</td>
            <td>Meter</td>
            </tr>
          </table>
          <br>
          <a href='index.html'>Neue Berechnung</a>";

          echo "<br><br><br><br><h3>Erklärung</h3>
          <h4>Ereignishorizont</h4>
          Wie alle Horizonte trennt der Ereignishorizont das Beobachtbare vom Verdeckten bzw. nicht Sichtbaren. Die Gravitation ist hier gerade noch stark genug um das Licht am Entweichen zu hindern.  
          In der Allgemeinen Relativitätstheorie ist der Ereignishorizont eine Grenzfläche in der Raumzeit, welche die Ereignisse jenseits dieser Grenzfläche vom außenstehenden Beobachter abschirmt. 
          'Ereignis' bezieht sich dabei auf einen Punkt in Raum und Zeit, der durch Ort und Zeit bestimmt wird. Deswegen Ereignishorizont. 
          <br><br>
          <h4>Schwarzschild Radius</h4>
          Der Radius eines statischen Schwarzen Lochs wird auch als Schwarzschild-Radius bezeichnet und begrenzt bzw. definiert die Größe des Ereignishorizonts (siehe Abb.). 
          <br><br><p style='text-align: center'><img src='Bilder/Blackhole-SRadius.png'></p><br>
          <p style='text-align: center'>Abb.: Aufbau eines statischen Schwarzen Lochs mit Ereignishorizont, Schwarzschild Radius und der Singularität.</p>
          <br><br>
          „Grundsätzlich kann jedes Objekt in ein Schwarzes Loch verwandelt werden, wenn es extrem verdichtet wird. Nach der Allgemeinen Relativitätstheorie von Albert Einstein verformt die verdichtete Masse die Raumzeit dabei so stark, dass ein Schwarzes Loch entsteht.“, schreibt die „It Times“ in ihrem Artikel über Schwarze Löcher. 
          <br><br>
          <h4>Berechnung</h4>
          Berechnen kann man den Schwarzschild-Radius mit der folgenden Formel:
          <p style='text-align: center'><img src='Bilder/Schw.Schild-R2.jpg'></p>
          <br><p style='text-align: right'>G...Gravitationskonstante <br> M...Masse des Objekts <br> c...Lichtgeschwindigkeit</p>
          <br><br><br>
          <h4>Photonensphäre</h4>
          Neben dem Ereignishorizont (bei Rs=1) hat ein Schwarzes Loch bei ungefähr Rs=1,5 eine sogenannte Photonensphäre. Diese besteht aus den auf das Schw. Loch treffenden Photonen, welche durch die starke Krümmung der Raum-Zeit auf eine Laufbahn um das Schw. Loch gelenkt werden, jedoch nicht in dieses fallen.
          <br><br>
          <p style='text-align: center'><img src='Bilder/photon-sphere.png' width='600'></p>
          <p style='text-align: center'>Abb.: Entstehung des Schattens und der Photonensphäre aus der Sicht eines statischen Beobachters bei r_0. Die gekrümmten roten/orangen Linien sind dabei die emitierten Photonen des Beobachters, welche vom Schw. Loch gekrümmt oder absorbiert werden.</p>
          <br><br><br><br>
          Hier eine Visualisierung des physikalischen Vorgangs:
          <br><br><br>
          <p style='text-align: center'><img src='Bilder/black-hole-gif.gif'></p>
          <br><br><br>
          <h4>Gravitationslinseneffekt</h4>
          Die Ablenkung des Lichts durch große Massen wird in der Astronomie als Gravitationslinseneffekt bezeichnet. Grundsätzlich wird Licht von einer entfernten Quelle, wie einem Stern, einer Galaxie oder einem anderen astronomischen Objekt entsendet. Dieses wird durch ein davor liegendes zweites Objekt – die Gravitationslinse – so beeinflusst, dass der Betrachter das Objekt hinter der Gravitationslinse nicht in der eigentlichen Form bzw. Position sehen kann. 
          Das geschieht durch die hohe Gravitation des Gravitationslinsen-Objekts, welches das Licht auf seiner geraden Bahn ablenkt.
          <br><br>
          <p style='text-align: center'><img src='Bilder/grav-linse.jpg' ></p>
          <p style='text-align: center'>Abb.: Links: die normale Ausbreitung von Licht; Rechts: die Beeinflussung der Gravitationslinse (grauer Kreis) auf die Ausbreitung von Licht.</p>
          <br><br><br>
          Hier eine Visualisierung des physikalischen Ereignises:
          <br><br><br>
          <p style='text-align: center'><img src='Bilder/Black_hole_lensing_web.gif' width='600'></p>
          <br><br><br><br>
          ";
        }

      ?>
    </div>
  </body>
</html>