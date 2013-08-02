<?php $this->extend('Europaphp\Main\Layout\cli'); ?>

<?php foreach ($this->context('modules') as $module): ?>
- <?php echo $this->helper('cli')->color($module['name'], 'green')
  . ' `'
  . $this->helper('cli')->color($module['version'], 'yellow')
  . '` '
  . $module['description']
  . PHP_EOL; ?>
<?php endforeach; ?>