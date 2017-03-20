jQuery("#simulation")
  .on("click", ".s-cb1453e5-2d61-4537-afff-4b1142b9a10c .click", function(event, data) {
    var jEvent, jFirer, cases;
    if(data === undefined) { data = event; }
    jEvent = jimEvent(event);
    jFirer = jEvent.getEventFirer();
    if(jFirer.is("#s-Button")) {
      cases = [
        {
          "blocks": [
            {
              "actions": [
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button span": {
                      "attributes": {
                        "color": "#80B8F1",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "serial",
                  "delay": 0
                },
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button span": {
                      "attributes": {
                        "color": "#007DFF",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "timed",
                  "delay": 300
                }
              ]
            }
          ],
          "exectype": "serial",
          "delay": 0
        }
      ];
      event.data = data;
      jEvent.launchCases(cases);
    } else if(jFirer.is("#s-Button_1")) {
      cases = [
        {
          "blocks": [
            {
              "actions": [
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_1": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_1 .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_1 span": {
                      "attributes": {
                        "color": "#80B8F1",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "serial",
                  "delay": 0
                },
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_1": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_1 .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_1 span": {
                      "attributes": {
                        "color": "#007DFF",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "timed",
                  "delay": 300
                }
              ]
            }
          ],
          "exectype": "serial",
          "delay": 0
        }
      ];
      event.data = data;
      jEvent.launchCases(cases);
    } else if(jFirer.is("#s-Button_2")) {
      cases = [
        {
          "blocks": [
            {
              "actions": [
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_2": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_2 .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_2 span": {
                      "attributes": {
                        "color": "#80B8F1",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "serial",
                  "delay": 0
                },
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_2": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_2 .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_2 span": {
                      "attributes": {
                        "color": "#007DFF",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "timed",
                  "delay": 300
                }
              ]
            }
          ],
          "exectype": "serial",
          "delay": 0
        }
      ];
      event.data = data;
      jEvent.launchCases(cases);
    } else if(jFirer.is("#s-Button_3")) {
      cases = [
        {
          "blocks": [
            {
              "actions": [
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_3": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_3 .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_3 span": {
                      "attributes": {
                        "color": "#80B8F1",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "serial",
                  "delay": 0
                },
                {
                  "action": "jimChangeStyle",
                  "parameter": [ {
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_3": {
                      "attributes": {
                        "font-size": "14.0pt",
                        "font-family": "Roboto-Light,Arial"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_3 .valign": {
                      "attributes": {
                        "vertical-align": "middle",
                        "text-align": "center"
                      }
                    }
                  },{
                    "#s-cb1453e5-2d61-4537-afff-4b1142b9a10c #s-Button_3 span": {
                      "attributes": {
                        "color": "#007DFF",
                        "text-align": "center",
                        "text-decoration": "none",
                        "font-family": "Roboto-Light,Arial",
                        "font-size": "14.0pt"
                      }
                    }
                  } ],
                  "exectype": "timed",
                  "delay": 300
                }
              ]
            }
          ],
          "exectype": "serial",
          "delay": 0
        }
      ];
      event.data = data;
      jEvent.launchCases(cases);
    }
  });