 <?php

    class ATR_QueriesAjax
    {
        public function get_filter_programs()
        {
            $destiny  = isset($_POST['destiny'])  ? sanitize_text_field($_POST['destiny'])  : '';
            $travel   = isset($_POST['travel'])   ? sanitize_text_field($_POST['travel'])   : '';
            $programs = isset($_POST['programs']) ? sanitize_text_field($_POST['programs']) : '';

            $data_destiny  = array();
            $data_programs = array();
            $data_collage  = array();

            if ($destiny) {
                $args = array(
                    'post_type'     => 'ciudad',
                    'order'         => 'ASC',
                    'pais'          => $destiny,
                    'tipo-de-viaje' => $travel
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $destiny_thumbnail = get_the_post_thumbnail();
                        $destiny_title     = get_the_title();
                        $destiny_content   = get_field('info_basica')['valores_card'];

                        $data_destiny[] = array(
                            'thumbnail' => $destiny_thumbnail,
                            'title'     => $destiny_title,
                            'content'   => $destiny_content
                        );
                    }

                    wp_reset_postdata();
                }
            }
            if ($programs) {
                $args = array(
                    'post_type'        => 'programa',
                    'order'            => 'ASC',
                    'tipo-de-programa' => $programs,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $program_thumbnail = get_the_post_thumbnail();
                        $program_title     = get_the_title();
                        $program_fields    =  get_field('info_card');
                        $program_content   =  $program_fields['descripcion'];
                        $program_buy       = $program_fields['pagar_experiencia'];
                        $data_programs[]   = array(
                            'thumbnail' => $program_thumbnail,
                            'title'     => $program_title,
                            'content'   => $program_content,
                            'buy'       => $program_buy
                        );
                    }

                    wp_reset_postdata();
                }


                $args = array(
                    'post_type' => 'college',
                    'order' => 'ASC',
                    'sede' => $destiny,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $college_thumbnail = get_the_post_thumbnail();
                        $college_title     = get_the_title();
                        $college_fields    =  get_field('info_card');
                        $college_logo      =  $college_fields['logo']['url'];
                        $college_content   =  $college_fields['descripcion'];
                        $college_buy       = $college_fields['pagar_experiencia'];
                        $data_collage[]   = array(
                            'thumbnail' => $college_thumbnail,
                            'title'     => $college_title,
                            'logo'      => $college_logo,
                            'content'   => $college_content,
                            'buy'       => $college_buy
                        );
                    }

                    wp_reset_postdata();
                }
            }

            wp_send_json(
                array(
                    'destiny' => $data_destiny,
                    'programs' => $data_programs,
                    'colleges' => $data_collage
                )
            );
        }
    }