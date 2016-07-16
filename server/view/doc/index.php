<div class="container">
    <div class="jumbotron">
        <h1>Kampfregeln - kurz skizziert</h1>
        <p>Alternative Kampfregeln, inspiriert durch <a href="http://www.wiki-aventurica.de/wiki/QVAT">QVAT</a> aus längst vergangen DSA 3.0 Zeiten (<a href="app-doc/kampf.pdf">PDF</a>).</p>
    </div>
    <div class="panel panel-default"><div class="panel-body">
        <div id="box"></div>
        <div class="row">
            <div class="col-md-3">
                <div class="btn-group-vertical" role="group">
                    <button id="toc-chap-intro" type="button" class="btn btn-default">Einleitung</button>
                    <button id="toc-chap-wunden" type="button" class="btn btn-default">Wunden</button>
                    <button id="toc-chap-qvat" type="button" class="btn btn-default">QVAT</button>
                    <button id="toc-chap-ini" type="button" class="btn btn-default">Initiative</button>
                    <button id="toc-chap-allgKampf" type="button" class="btn btn-default">Allgemeines zum Kampf</button>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button">
                            Bewaffnete AT-Manöver
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="toc-aktion-angriff_mit_dem_schild">Angriff mit dem Schild</a></li>
                            <li><a href="#" id="toc-aktion-auf_distanz_halten">Auf Distanz halten</a></li>
                            <li><a href="#" id="toc-aktion-ausfall">Ausfall</a></li>
                            <li><a href="#" id="toc-aktion-befreiungsschlag">Befreiungsschlag</a></li>
                            <li><a href="#" id="toc-aktion-betaeubungsschlag">Beätubungsschlag</a></li>
                            <li><a href="#" id="toc-aktion-doppelangriff">Doppelangriff</a></li>
                            <li><a href="#" id="toc-aktion-entwaffnen">Entwaffnen</a></li>
                            <li><a href="#" id="toc-aktion-festnageln">Festnageln</a></li>
                            <li><a href="#" id="toc-aktion-finte">Finte</a></li>
                            <li><a href="#" id="toc-aktion-gezielter_stich">Gezielter Stich</a></li>
                            <li><a href="#" id="toc-aktion-hammerschlag">Hammerschlag</a></li>
                            <li><a href="#" id="toc-aktion-klingensturm">Klingensturm</a></li>
                            <li><a href="#" id="toc-aktion-niederwerfen">Niederwerfen</a></li>
                            <li><a href="#" id="toc-aktion-passierschlag">Passierschlag</a></li>
                            <li><a href="#" id="toc-aktion-schildspalter">Schildspalter</a></li>
                            <li><a href="#" id="toc-aktion-stumpfer_schlag">Stumpfer Schlag</a></li>
                            <li><a href="#" id="toc-aktion-sturmangriff">Sturmangriff</a></li>
                            <li><a href="#" id="toc-aktion-todesstoss">Todesstoss</a></li>
                            <li><a href="#" id="toc-aktion-tod_von_links">Tod von Links</a></li>
                            <li><a href="#" id="toc-aktion-umreissen">Umreissen</a></li>
                            <li><a href="#" id="toc-aktion-unterlaufen">Unterlaufen</a></li>
                            <li><a href="#" id="toc-aktion-wuchtschlag">Wuchtschlag</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button">
                            Bewaffnete PA-Manöver
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="toc-reaktion-binden">Binden</a></li>
                            <li><a href="#" id="toc-reaktion-defensiver_kampfstil">Defensiver kampfstil</a></li>
                            <li><a href="#" id="toc-reaktion-entwaffnen">Entwaffnen</a></li>
                            <li><a href="#" id="toc-reaktion-formation">Formation</a></li>
                            <li><a href="#" id="toc-reaktion-gegenhalten">Gegenhalten</a></li>
                            <li><a href="#" id="toc-reaktion-klingenwand">Klingenwand</a></li>
                            <li><a href="#" id="toc-reaktion-meisterparade">Meisterparade</a></li>
                            <li><a href="#" id="toc-reaktion-unterlaufen">Unterlaufen</a></li>
                            <li><a href="#" id="toc-reaktion-waffe_zerbrechen">Waffe zerbrechen</a></li>
                            <li><a href="#" id="toc-reaktion-windmuehle">Windmuehle</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button">
                            Fernkampf Manöver
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="toc-fernkampf-ansage">Ansage</a></li>
                            <li><a href="#" id="toc-fernkampf-eisenhagel">Eisenhagel</a></li>
                            <li><a href="#" id="toc-fernkampf-schnellschuss">Schnellschuss</a></li>
                            <li><a href="#" id="toc-fernkampf-zielen">Zielen</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button">
                            Sonderfertigkeiten
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="app-doc/fig/bSF.pdf" id="img-fig-bSF">Übersicht Bewaffnete SFs</a></li>
                            <li><a href="app-doc/fig/fkSF.pdf" id="img-fig-fkSF">Übersicht Fernkampf SFs</a></li>
                            <li class="divider" role="presentation"></li>
                            <li><a href="#" id="toc-sf-aufmerksamkeit">Aufmerksamkeit</a></li>
                            <li><a href="#" id="toc-sf-ausfall">Ausfall</a></li>
                            <li><a href="#" id="toc-sf-ausweichen">Ausweichen</a></li>
                            <li><a href="#" id="toc-sf-befreiungsschlag">Befreiungsschlag</a></li>
                            <li><a href="#" id="toc-sf-beidhaendiger_kampf">Beidhändiger Kampf</a></li>
                            <li><a href="#" id="toc-sf-berittener_schuetze">Berittener Schütze</a></li>
                            <li><a href="#" id="toc-sf-betaeubungsschlag">Betäubungsschlag</a></li>
                            <li><a href="#" id="toc-sf-binden">Binden</a></li>
                            <li><a href="#" id="toc-sf-blindkampf">Blindkampf</a></li>
                            <li><a href="#" id="toc-sf-defensiver_kampfstil">Defensiver Kampfstil</a></li>
                            <li><a href="#" id="toc-sf-doppelangriff">Doppelangriff</a></li>
                            <li><a href="#" id="toc-sf-eisenhagel">Eisenhagel</a></li>
                            <li><a href="#" id="toc-sf-entwaffnen">Entwaffnen</a></li>
                            <li><a href="#" id="toc-sf-festnageln">Festnageln</a></li>
                            <li><a href="#" id="toc-sf-finte">Finte</a></li>
                            <li><a href="#" id="toc-sf-formation">Formation</a></li>
                            <li><a href="#" id="toc-sf-gegenhalten">Gegenhalten</a></li>
                            <li><a href="#" id="toc-sf-gezielter_stich">Gezielter Stich</a></li>
                            <li><a href="#" id="toc-sf-halbschwert">Halbschwert</a></li>
                            <li><a href="#" id="toc-sf-hammerschlag">Hammerschlag</a></li>
                            <li><a href="#" id="toc-sf-improvisierte_waffen">Improvisierte Waffen</a></li>
                            <li><a href="#" id="toc-sf-kampfgespuer">Kampfgespür</a></li>
                            <li><a href="#" id="toc-sf-kampf_im_wasser">Kampf im Wasser</a></li>
                            <li><a href="#" id="toc-sf-kampfreflexe">Kampfreflexe</a></li>
                            <li><a href="#" id="toc-sf-klingensturm">Klingensturm</a></li>
                            <li><a href="#" id="toc-sf-klingentaenzer">Klingentänzer</a></li>
                            <li><a href="#" id="toc-sf-klingenwand">Klingenwand</a></li>
                            <li><a href="#" id="toc-sf-kriegsreiterei">Kriegsreiterei</a></li>
                            <li><a href="#" id="toc-sf-linkhand">Linkhand</a></li>
                            <li><a href="#" id="toc-sf-meisterliches_entwaffnen">Meisterliches Entwaffnen</a></li>
                            <li><a href="#" id="toc-sf-meisterparade">Meisterparade</a></li>
                            <li><a href="#" id="toc-sf-meisterschuetze">Meisterschütze</a></li>
                            <li><a href="#" id="toc-sf-niederwerfen">Niederwerfen</a></li>
                            <li><a href="#" id="toc-sf-parierwaffen">Parierwaffen</a></li>
                            <li><a href="#" id="toc-sf-reiterkampf">Reiterkampf</a></li>
                            <li><a href="#" id="toc-sf-ruestungsgewoehnung">Rüstungsgewöhnung</a></li>
                            <li><a href="#" id="toc-sf-scharfschuetze">Scharfschütze</a></li>
                            <li><a href="#" id="toc-sf-schildkampf">Schildkampf</a></li>
                            <li><a href="#" id="toc-sf-schildspalter">Schildspalter</a></li>
                            <li><a href="#" id="toc-sf-schnellladen">Schnellladen</a></li>
                            <li><a href="#" id="toc-sf-schnellziehen">Schnellziehen</a></li>
                            <li><a href="#" id="toc-sf-spiessgespann">Spiessgespann</a></li>
                            <li><a href="#" id="toc-sf-sturmangriff">Sturmangriff</a></li>
                            <li><a href="#" id="toc-sf-todesstoss">Todesstoss</a></li>
                            <li><a href="#" id="toc-sf-tod_von_links">Tod von Links</a></li>
                            <li><a href="#" id="toc-sf-turnierreiterei">Turnierreiterei</a></li>
                            <li><a href="#" id="toc-sf-umreissen">Umreissen</a></li>
                            <li><a href="#" id="toc-sf-unterwasserkampf">Unterwasserkampf</a></li>
                            <li><a href="#" id="toc-sf-waffe_zerbrechen">Waffe Zerbrechen</a></li>
                            <li><a href="#" id="toc-sf-windmuehle">Windmühle</a></li>
                            <li><a href="#" id="toc-sf-wuchtschlag">Wuchtschlag</a></li>
                        </ul>
                    </div>
                    <button id="toc-chap-aktion" type="button" class="btn btn-default">Zusätzliche Aktion/Reaktion</button>
                </div>
            </div>
            <div class="col-md-9" id="chap"></div>
        </div>
    </div></div>
</div>
