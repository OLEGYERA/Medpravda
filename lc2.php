<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            @if($ware->instruction_adaptive_ua->composition && $ware->instruction_adaptive_ua->composition !== '<p><br></p>')
            {
                "@type": "Question",
                "name": "Який склад у медичного виробу {{$ware->utitle}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive_ua->composition !!}"
                }
                @if($ware->instruction_adaptive_ua->pharma_props && $ware->instruction_adaptive_ua->pharma_props !== '<p><br></p>'
                || $ware->instruction_adaptive_ua->indications && $ware->instruction_adaptive_ua->indications !== '<p><br></p>'
                || $ware->instruction_adaptive_ua->contraindications && $ware->instruction_adaptive_ua->contraindications !== '<p><br></p>'
                || $ware->instruction_adaptive_ua->usage_and_dose && $ware->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
            @endif

            @if($ware->instruction_adaptive_ua->pharma_props && $ware->instruction_adaptive_ua->pharma_props !== '<p><br></p>')
            {
                "@type": "Question",
                "name": "Які властивості у медичного виробу {{$ware->utitle}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive_ua->pharma_props !!}"
                }
                @if($ware->instruction_adaptive_ua->indications && $ware->instruction_adaptive_ua->indications !== '<p><br></p>'
                || $ware->instruction_adaptive_ua->contraindications && $ware->instruction_adaptive_ua->contraindications !== '<p><br></p>'
                || $ware->instruction_adaptive_ua->usage_and_dose && $ware->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
            @endif

            @if($ware->instruction_adaptive_ua->indications && $ware->instruction_adaptive_ua->indications !== '<p><br></p>')
            {
                "@type": "Question",
                "name": "Для чого потрібно застосовувати медичний виріб {{$ware->utitle}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive_ua->indications !!}"
                }
                @if($ware->instruction_adaptive_ua->contraindications && $ware->instruction_adaptive_ua->contraindications !== '<p><br></p>'
                || $ware->instruction_adaptive_ua->usage_and_dose && $ware->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
            @endif

            @if($ware->instruction_adaptive_ua->contraindications && $ware->instruction_adaptive_ua->contraindications !== '<p><br></p>')
            {
                "@type": "Question",
                "name": "Які протипоказання у медичного виробу {{$ware->utitle}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive_ua->contraindications !!}"
                }
                @if($ware->instruction_adaptive_ua->usage_and_dose && $ware->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
            @endif

            @if($ware->instruction_adaptive_ua->usage_and_dose && $ware->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            {
                "@type": "Question",
                "name": "Як застосовувати медичний виріб {{$ware->utitle}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive_ua->usage_and_dose !!}"
                }
            }
            @endif
        ]
    }
</script>
