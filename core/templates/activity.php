<?php
/** @var $this \views\Index */

$this->renderBlock('_innerHeader', array(
    'active' => 'activity',
    'title' => $this->getOwner()->getConfig('appName') . ' | Activity'
));
?>
    <main class="main">

        <ul class="activity-tabs container">
            <li><a href="#signActivityPane" class="active">Signs</a></li>
            <li><a href="#deviceActivityPane">Devices</a></li>
        </ul>

        <div class="activity-contant container">

            <!-- #activity-sign -->
            <div class="activity-pane col-md-9 col-md-offset-1 fade in active" id="signActivityPane">
                <div class="row-titles row hidden-xs">
                    <div class="col-md-2 col-sm-2">
                        <span>Event</span>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <span>Device</span>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <span>Where</span>
                    </div>
                </div>
                <ul class="activity-list row">
                    <li>
                        <button data-target="#sign2" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
                        <div id="sign2" class="collapse">
                            <div class="activity-list_row">
                                <div class="event-column col-md-2 col-sm-2 hidden-xs">
                                    <span>Sign in</span>
                                </div>
                                <div class="device-column col-md-6 col-sm-6">
                                    <span>Nexus 4 - ID: 23456789012</span>
                                </div>
                                <div class="where-column col-md-4 col-sm-4">
                                    <span>www.amazon.com</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button data-target="#sign1" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
                        <div id="sign1" class="collapse">
                            <div class="activity-list_row">
                                <div class="event-column col-md-2 col-sm-2 hidden-xs">
                                    <span>Sign in</span>
                                </div>
                                <div class="device-column col-md-6 col-sm-6">
                                    <span>Nexus 4 - ID: 23456789012</span>
                                </div>
                                <div class="where-column col-md-4 col-sm-4">
                                    <span>www.amazon.com</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- end #activity-sign -->

            <!-- #activity-device -->
            <div class="activity-pane col-md-9 col-md-offset-1 fade" id="deviceActivityPane">
                <div class="row-titles row hidden-xs">
                    <div class="col-md-3 col-sm-3">
                        <span>Time</span>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <span>Event</span>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <span>Device</span>
                    </div>
                </div>
                <ul class="activity-list row">
                    <li>
                        <button data-target="#device2" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
                        <div id="device2" class="collapse">
                            <div class="activity-list_row">
                                <div class="date-column col-md-3 col-sm-3 hidden-xs">
                                    <span>2016.11.23 11.35 pm</span>
                                </div>
                                <div class="event-column event-icon connected col-md-4 col-sm-4">
                                    <span>Connected</span>
                                </div>
                                <div class="device-column col-md-5 col-sm-5">
                                    <span>Nexus 4 - ID: 23456789012</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button data-target="#device1" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
                        <div id="device1" class="collapse">
                            <div class="activity-list_row">
                                <div class="date-column col-md-3 col-sm-3 hidden-xs">
                                    <span>2016.11.23 11.35 pm</span>
                                </div>
                                <div class="event-column event-icon mmain col-md-4 col-sm-4">
                                    <span>Made Main</span>
                                </div>
                                <div class="device-column col-md-5 col-sm-5">
                                    <span>iPhone SE - ID: 112345678910111213</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- end #activity-device -->

        </div>

    </main>
<?php $this->renderBlock('_innerFooter'); ?>