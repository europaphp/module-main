<?php $this->extend('europaphp/main/layout/cli.php'); ?>

<?php foreach ($this->context('modules') as $module): ?>
- <?php echo $this->helper('cli')->color($module->getName(), 'green') . ' ' . $this->helper('cli')->color($module->getVersion(), 'yellow') . PHP_EOL; ?>
<?php endforeach; ?>