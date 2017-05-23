<?php
/** @var $this \views\Index */

$this->renderBlock('_innerHeader', array(
        'active' => 'dashboard',
        'title' => $this->getOwner()->getConfig('appName') . ' | Dashboard'
));
?>
    <main class="main">
        <div class="device-title text-center container">
            <h2>Devices</h2>
        </div>
        <div class="devices-contant container">
            <ul class="devices-list col-md-8">
                <?php if (!empty($devices)): ?>
                    <?php foreach ($devices as $device): ?>
                        <li id="uid-<?php echo $device['uid']; ?>" class="device <?php if ($device['isEnabled']): ?>online-device<?php else: ?>offline-device<?php endif; ?> <?php if ($device['isMain']): ?>main-device<?php endif; ?>">
                            <div class="device_image hidden-xs text-right col-md-1 col-sm-1">
                                <?php if (stristr($device['model'], 'iphone')) { ?>
                                    <img src="assets/img/devices/iphone.svg" alt="<?php echo $device['name']; ?>">
                                <?php } elseif (stristr($device['model'], 'ipad')) { ?>
                                    <img src="assets/img/devices/ipad.svg" alt="<?php echo $device['name']; ?>">
                                <?php } elseif (stristr($device['model'], 'sumsung')) { ?>
                                    <img src="assets/img/devices/sumsung.svg" alt="<?php echo $device['name']; ?>">
                                <?php } else { ?>
                                    <img src="assets/img/devices/nexus.svg" alt="<?php echo $device['name']; ?>">
                                <?php } ?>
                            </div>
                            <a data-target="#device2"
                               class="device_info online-device collapse-btn col-md-4 col-sm-4">
                                <b><?php echo $device['model']; ?></b>
                                <span>ID: <?php echo $device['uid']; ?></span>
                            </a>
                            <div class="device_btn-group collapse col-md-7 col-sm-7" id="device2">
                                <ul>
                                    <?php if (!$device['isMain']): ?>
                                        <li><a data-id="<?php echo $device['uid']; ?>" href="#" class="btn make-main-device">Make Main</a></li>
                                        <?php if ($device['isEnabled']): ?>
                                            <li><a data-id="<?php echo $device['uid']; ?>" href="#" class="btn btn-clear disconnect-device">Disconnect</a></li>
                                        <?php else: ?>
                                            <li><a data-id="<?php echo $device['uid']; ?>" href="#" class="btn btn-clear connect-device">Connect</a></li>
                                        <?php endif; ?>
                                        <li><a data-id="<?php echo $device['uid']; ?>" href="#" class="btn btn-clear remove-device">Remove</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <i>You have no devices yet!</i>
                <?php endif; ?>
            </ul><!-- end devices-list -->
        </div>
    </main>
<?php $this->renderBlock('_innerFooter'); ?>