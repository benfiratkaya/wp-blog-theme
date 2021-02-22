<?php if (!post_password_required()): ?>
  <?php if (comments_open()): ?>
    <div class="write-comment">
      <?php
        $comment_form_args = array(
          'title_reply'           =>  __('Leave a Reply'),
          'title_reply_before'    =>  '<h4 id="formHeader" class="mb-3">',
          'title_reply_after'     =>  '</h4>',
          'class_form'            =>  'card article-content card-body',
          'comment_notes_before'  =>  '',
          'comment_notes_after'   =>  '',
          'fields' => apply_filters(
            'comment_form_default_fields',
            array(
              'author'            =>  '<div class="form-row">'.
                                        '<div class="form-group col-md-6">'.
                                          '<label for="inputFullName">'.__('Name').':</label>'.
                                          '<input type="text" id="inputFullName" class="form-control" name="author" placeholder="Ahmet Yılmaz" value="'.esc_attr($commenter['comment_author']).'" maxlength="245" '.$aria_req.'>'.
                                        '</div>',
              'email'             =>    '<div class="form-group col-md-6">'.
                                          '<label for="inputEmail">'.__('Email').':</label>'.
                                          '<input type="email" id="inputEmail" class="form-control" name="email" placeholder="example@domain.com" value="'.esc_attr($commenter['comment_author_email']).'" maxlength="100" aria-describedby="email-notes" '.$aria_req.'>'.
                                        '</div>'.
                                      '</div>',
              'cookies'           =>  '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden" value="yes">',
            )
          ),
          'comment_field'         =>  '<div class="form-group">'.
                                        '<label for="textareaMessage">'._x('Comment', 'noun').':</label>'.
                                        '<textarea id="textareaMessage" class="form-control" name="comment" rows="3" placeholder="'.__('Leave a Reply').'" maxlength="65525" aria-required="true"></textarea>'.
                                      '</div>',
          'class_submit'          =>  'btn btn-primary rounded-pill',
          'submit_field'          =>  '<div class="clearfix">'.
                                        '<div class="float-right">'.
                                          '%1$s %2$s'.
                                        '</div>'.
                                      '</div>'
        );
      ?>
      <?php comment_form($comment_form_args); ?>
    </div>
    <div id="comments" class="comments">
      <h4 class="mt-5 mb-3"><?php printf('%s (%s)', __('Comments'), number_format_i18n(absint(get_comments_number()))); ?></h4>
      <?php if (have_comments()): ?>
        <?php
          $wp_list_comments_args = array(
            'avatar_size' => 64,
            'format'      => 'html5',
            'short_ping'  => true,
            'style'       => 'div',
            'walker'      => new BenFiratKaya_Walker_Comment()
          );
        ?>
        <?php wp_list_comments($wp_list_comments_args); ?>
        <?php get_template_part('template-parts/paginations/pagination', 'comments'); ?>
      <?php else: ?>
        <?php get_template_part('template-parts/alerts/comments', 'suggestion'); ?>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <?php get_template_part('template-parts/alerts/comments', 'closed'); ?>
  <?php endif; ?>
<?php else: ?>
  <?php get_template_part('template-parts/alerts/comments', 'password_required'); ?>
<?php endif; ?>
