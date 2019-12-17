<div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <!-- <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 2
                                        </a>
                                    </li>
                                </ul> -->
                            </div>
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <span style="cursor: auto;" class="nav-link">Developed by</span>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://www.optima-solution.com/" target="_blank" class="nav-link">
                                            Optima Sollution
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= $path ?>/assets/scripts/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?= $path ?>/assets/scripts/main.js"></script>
    <script type="text/javascript" src="<?= $path ?>/assets/scripts/app.js"></script>
    <script type="text/javascript" src="<?= $path ?>/assets/scripts/parsley.js"></script>
    <!-- Additional Scripts here -->
    <?php if (function_exists('customPagefooter')){
      customPagefooter();
    }?>
</body>

</html>