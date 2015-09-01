<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WordPlate\WordPress\Components;

use WordPlate\Application;

/**
 * This is the dashboard component class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
final class Dashboard extends Component
{
    /**
     * Bootstrap the component.
     *
     * @param \WordPlate\Application $app
     */
    public function bootstrap(Application $app)
    {
        $this->action->add('wp_dashboard_setup', [$this, 'setup']);
    }

    /**
     * Remove unwanted dashboard widgets.
     *
     * @return void
     */
    public function setup()
    {
        global $wp_meta_boxes;

        $positions = config('dashboard.widgets');

        foreach ($positions as $position => $boxes) {
            foreach ($boxes as $box) {
                unset($wp_meta_boxes['dashboard'][$position]['core'][$box]);
            }
        }
    }
}