<?php $this->extend('europaphp\main\layout\cli'); ?>

<?php foreach ($this->context('modules') as $module): ?>
- <?php echo $this->helper('cli')->color($module['name'], 'green')
  . ' @ '
  . $this->helper('cli')->color($module['version'], 'yellow')
  . ($module['installed'] ? ' ' . $this->helper('cli')->color('INSTALLED', 'cyan') : '')
  . PHP_EOL
  . '  '
  . $module['description']
  . PHP_EOL
  . PHP_EOL; ?>
<?php endforeach; ?>