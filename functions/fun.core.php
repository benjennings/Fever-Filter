<?php

#-----------------------------------------------------------------------#
# Set up login info for the SQL database                                #
#-----------------------------------------------------------------------#
    $db_host   = "";
    $db_user   = "";
    $db_pass   = "";
    $db_name   = "";
   
#----------------------------------------------------------------------#
# Include the ezSQL functions first                                    #
#----------------------------------------------------------------------#
    include_once 'ezsql/ez_sql_core.php';
    include_once 'ezsql/ez_sql_mysql.php';
   
#----------------------------------------------------------------------#
# Setup an ezSQL database                                              #
#----------------------------------------------------------------------#
    global $db;
    $db = new ezSQL_mysql($db_user, $db_pass, $db_name, $db_host);
   
#----------------------------------------------------------------------#
# Debug function                                                       #
#----------------------------------------------------------------------#
    $debug = false;                  // Set TRUE for debug() to work.
    $db->debug_all = false;          // Set TRUE to output all DB queries/results.

    function debug() {
        if (debug) {
          $args = func_get_args();
          $args[0] = "<pre>" . $args[0] . "</pre>\n";
          for ($i = 1, $l = count($args); $i < $l; $i++) {
              $args[$i] = htmlspecialchars(var_export($args[$i], true));
          }
          call_user_func_array('printf', $args);
        }
    }
?>