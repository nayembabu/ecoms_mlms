
<?php

    function renderTree($tree) {
        echo '<ul>';
        foreach ($tree as $node) {
            echo '<li>';
            echo 'User ID: ' . $node['user_id'] . ' - Name: ' . $node['full_name'];
            if (!empty($node['children'])) {
                renderTree($node['children']);
            }
            echo '</li>';
        }
        echo '</ul>';
    }

    renderTree($tree);

?>





