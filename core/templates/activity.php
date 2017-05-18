<?php
/** @var $this \views\Index */

$this->renderBlock('_innerHeader', array(
    'active' => 'activity',
    'title' => $this->getOwner()->getConfig('appName') . ' | Activity'
));
?>
    <main class="main">

        <ul class="activity-tabs container">
            <li><a href="#signActivityPane" class="active">Signatures</a></li>
            <li><a href="#deviceActivityPane">Devices</a></li>
        </ul>

        <div class="activity-contant container">
            <!-- #activity-sign -->
            <div class="activity-pane col-md-9 col-md-offset-1 fade in active" id="signActivityPane">
                <div class="row-titles row hidden-xs">
                    <div class="col-md-3 col-sm-3">
                        <span>Time</span>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <span>Device</span>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <span>Event</span>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <span>Where</span>
                    </div>
                </div>
                <?php if (!empty($signLogs['logs'])): ?>
                <ul class="activity-list row">
                    <?php foreach($signLogs['logs'] as $signLog): ?>
                        <li>
                            <button data-target="#sign2" class="collapse-btn visible-xs">
                                <?php echo date('Y.m.d h:i a', strtotime($signLog['datetime'])); ?>
                            </button>
                            <div id="sign2" class="collapse">
                                <div class="activity-list_row">
                                    <div class="time-column col-md-3 col-sm-3 hidden-xs">
                                        <span>
                                            <?php echo date('Y.m.d h:i a', strtotime($signLog['datetime'])); ?>
                                        </span>
                                    </div>
                                    <div class="device-column col-md-4 col-sm-4">
                                        <span>
                                            <?php echo $signLog['device']; ?>
                                        </span>
                                    </div>
                                    <div class="event-column col-md-2 col-sm-2 hidden-xs">
                                        <span>
                                            <?php echo $signLog['type']; ?>
                                        </span>
                                    </div>
                                    <div class="where-column col-md-3 col-sm-3">
                                        <span>
                                            <?php if ('add device' == strtolower($signLog['type'])): ?>
                                                Mobile
                                            <?php else: ?>
                                                <?php echo $signLog['domain']; ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                    <p class="text-center"><i>There are no logs yet.</i></p>
                <?php endif; ?>
            </div><!-- end #activity-sign -->

            <!-- #activity-device -->
            <div class="activity-pane col-md-9 col-md-offset-1 fade" id="deviceActivityPane">
                <div class="row-titles row hidden-xs">
                    <div class="col-md-3 col-sm-3">
                        <span>Time</span>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <span>Device</span>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <span>Event</span>
                    </div>
                </div>
                <?php if (!empty($deviceLogs['logs'])): ?>
                    <ul class="activity-list row">
                        <?php foreach($deviceLogs['logs'] as $deviceLog): ?>
                            <li>
                                <button data-target="#device2" class="collapse-btn visible-xs">
                                    <?php echo date('Y.m.d h:i a', strtotime($deviceLog['datetime'])); ?>
                                </button>
                                <div id="device2" class="collapse">
                                    <div class="activity-list_row">
                                        <div class="date-column col-md-3 col-sm-3 hidden-xs">
                                            <span>
                                                <?php echo date('Y.m.d h:i a', strtotime($deviceLog['datetime'])); ?>
                                            </span>
                                        </div>
                                        <div class="device-column col-md-5 col-sm-5">
                                            <span><?php echo $deviceLog['device']; ?></span>
                                        </div>
                                        <div class="event-column connected col-md-4 col-sm-4">
                                            <span><?php echo $deviceLog['action']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-center"><i>There are no logs yet.</i></p>
                <?php endif; ?>
            </div><!-- end #activity-device -->
        </div>
    </main>
<?php $this->renderBlock('_innerFooter'); ?>