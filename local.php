<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @if($cosmetic->instruction_adaptive_ua->composition && $cosmetic->instruction_adaptive_ua->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Який склад у косметичного засобу {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->composition !!}"
            }
         @if($cosmetic->instruction_adaptive_ua->pharma_props && $cosmetic->instruction_adaptive_ua->pharma_props !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
        @endif

        @if($cosmetic->instruction_adaptive_ua->pharma_props && $cosmetic->instruction_adaptive_ua->pharma_props !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які властивості у косметичного засобу {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->pharma_props !!}"
            }
          @if($cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
        @endif

        @if($cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Для чого потрібно застосовувати косметичний засіб {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->indications !!}"
            }
         @if($cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
        @endif

        @if($cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які протипоказання у косметичного засобу {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->contraindications !!}"
            }
         @if($cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
          },
         @else
          }
         @endif
        @endif

        @if($cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Як застосовувати косметичний засіб {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->usage_and_dose !!}"
            }
        }
        @endif
       ]
    }
</script>
