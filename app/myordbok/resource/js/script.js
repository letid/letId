/*
 * MyOrdbok
 */
(function(e, t) {
    e.fn.MyOrdbok = function(n) {
        var i = {
            tag: {
                f: "<form>",
                p: "<p>",
                i: "<input>",
                l: "<label>",
                t: "<textarea>",
                d: "<div>",
                u: "<ul>",
                o: "<ol>",
                li: "<li>",
                a: "<a>",
                s: "<span>",
                e: "<em>",
                strong: "<strong>",
                bold: "<b>",
                img: "<img>",
                h4: "<h4>"
            },
            name: {
                form: 'form[name="*"]',
                input: 'input[name="*"]',
                button: 'button[name="*"]',
                meta: 'meta[name="*"]',
                tag: "<*>",
                "class": ".",
                id: "#"
            },
            check: function(e) {
                return typeof e != "undefined" ? e : "";
            },
            data: {
                link: function(t) {
                    e.each(t, function(t, n) {
                        i[n] = e('link[rel="*"]'.replace("*", n)).attr("href");
                    });
                },
                meta: function(t) {
                    e.each(t, function(t, n) {
                        i[n] = e(i.name.meta.replace("*", n)).attr("content");
                    });
                }
            },
            Form: function(e) {
                return this.name.form.replace("*", e);
            },
            Input: function(e) {
                return this.name.input.replace("*", e);
            },
            Tag: function(e) {
                return this.name.tag.replace("*", e);
            },
            Class: function(e) {
                return this.name.class + e;
            },
            Id: function(e) {
                return this.name.id + e;
            },
            Char: function(t) {
                return e.map(t, function(t) {
                    return e.isNumeric(t) ? String.fromCharCode(t) : t;
                }).join("");
            },
            Url: function(t) {
                return e.map(t, function(t) {
                    if (e.isPlainObject(t)) {
                        return "?" + e.param(t);
                    } else if (t) {
                        return t.slice(-1) == "/" ? t.slice(0, -1) : t;
                    }
                }).join("/").replace("/?", "?");
            },
            Trim: function(e) {
                var t = /[^a-zA-Z0-9 ]/g;
                if (e.match(t)) {
                    e = e.replace(t, "");
                }
                return e.replace(/ /g, "");
            },
            store: {
                s: function(e, t, n) {
                    var i;
                    if (n) {
                        var r = new Date();
                        r.setTime(r.getTime() + n * 24 * 60 * 60 * 1e3);
                        i = "; expires=" + r.toGMTString();
                    }
                    document.cookie = escape(e) + "=" + escape(t) + i + "; path=/";
                },
                g: function(e) {
                    var t = escape(e) + "=";
                    var n = document.cookie.split(";");
                    for (var i = 0; i < n.length; i++) {
                        var r = n[i];
                        while (r.charAt(0) === " ") r = r.substring(1, r.length);
                        if (r.indexOf(t) === 0) return unescape(r.substring(t.length, r.length));
                    }
                    return null;
                },
                r: function(e) {
                    this.s(e, "", -1);
                }
            },
            html: function(t, n, r) {
                e.each(n, function(n, a) {
                    var s = function(t, n, r) {
                        if (t) {
                            if (t.t) {
                                if (!t.l) n.append(e(i.tag(t.t), t.d)); else if (t.d) var a = t.d; else var a = null;
                            }
                            if (t.l && t.l.length) {
                                var l = e(i.tag(t.t), a);
                                for (index in t.l) s(t.l[index], l);
                                n[r || "append"](l);
                            }
                        }
                    };
                    s(a, t, r);
                });
                return t;
            },
            serializeObject: function(t) {
                var n = {};
                e.each(t.serializeArray(), function(e, t) {
                    n[t.name] = t.value;
                });
                return n;
            },
            serializeJSON: function(t) {
                var n = {};
                e.each(t.serializeArray(), function() {
                    if (n[this.name] !== undefined) {
                        if (!n[this.name].push) {
                            n[this.name] = [ n[this.name] ];
                        }
                        n[this.name].push(this.value || "");
                    } else {
                        n[this.name] = this.value || "";
                    }
                });
                return n;
            }
        };
        i.data.link([ "api" ]);
        var r = {
            suggest: {
                form: "search",
                field: "q",
                button: "submit",
                classIn: "in",
                className: "selected",
                listCurrent: -1,
                listTotal: 0,
                delay: 0,
                result: "#suggest",
                ready: function() {
                    var t = this;
                    t.form = e(i.Form(t.form));
                    if (!t.form.length) return;
                    t.field = t.form.find(i.Input(t.field)).attr("autocomplete", "off").focus().select();
                    t.result = e(t.result);
                    t.field.focusin(function() {
                        t.form.addClass(t.classIn);
                    }).focusout(function() {
                        setTimeout(function() {
                            t.clear();
                        }, 200);
                    }).keyup(function(n) {
                        var i = n || window.event;
                        var r = e(this).val();
                        t.form.addClass(t.classIn);
                        if (t.arrows(i.keyCode, i.ctrlKey || i.metaKey) != true) setTimeout(function() {
                            t.listener(r);
                        }, t.delay);
                    });
                },
                clear: function() {
                    this.result.empty();
                    this.form.removeClass(this.classIn);
                },
                listener: function(t) {
                    var n = this;
                    var i = n.field.val();
                    if (i == "" || t != i) return;
                    e.getJSON("/api/suggestion", {
                        q: i
                    }, function(t) {
                        n.listTotal = t.length;
                        if (n.listTotal > 0) {
                            n.result.empty();
                            e.each(t, function(t, r) {
                                e("<p>", {
                                    title: r,
                                    html: r.replace(new RegExp(i, "i"), "<b>$&</b>")
                                }).appendTo(n.result).mousemove(function() {
                                    n.add(this);
                                });
                            });
                        } else {
                            n.clear();
                        }
                    });
                },
                arrows: function(t, n) {
                    var i = this;
                    if (e.inArray(t, [ 40, 38, 13 ]) >= 0) {
                        if (t == 38) {
                            if (i.listCurrent <= 0) {
                                i.listCurrent = i.listTotal - 1;
                            } else {
                                i.listCurrent--;
                            }
                        } else {
                            if (i.listCurrent >= i.listTotal - 1) {
                                i.listCurrent = 0;
                            } else {
                                i.listCurrent++;
                            }
                        }
                        i.result.children().each(function(e) {
                            if (e == i.listCurrent) i.add(this);
                        });
                        return true;
                    } else if (e.inArray(t, [ 13, 37, 39, 16, 17, 116 ]) >= 0) {
                        return true;
                    } else if (n && e.inArray(t, [ 67 ]) >= 0) {
                        return true;
                    } else if (t == 27) {} else if (t == 13) {
                        return false;
                    } else {
                        i.listCurrent = -1;
                        return false;
                    }
                },
                add: function(t) {
                    var n = this;
                    var i = e(t);
                    n.field.val(i.attr("title"));
                    i.addClass(n.className).siblings().removeClass();
                    n.listCurrent = i.index();
                    i.click(function() {
                        n.form.submit();
                    });
                }
            },
            speech: function() {
                var e = t.createElement("audio");
                e.src = i.Url([ i.api, "speech", {
                    q: r.x.text(),
                    l: r.c[1]
                } ]);
                e.load();
                e.play();
            },
            click: function() {
                e(t).on("click", i.Class("zA"), function(t) {
                    var n = e(this);
                    r.x = n;
                    r.c = n.attr("class").split(" ");
                    a(r.c);
                    t.preventDefault();
                    t.stopPropagation();
                });
            },
            img: {
                set: function() {}
            }
        };
        function a(t) {
            if (r[t[0]] && e.isFunction(r[t[0]])) r[t[0]](); else if (r[t[0]] && e.isFunction(r[t[0]][t[1]])) r[t[0]][t[1]](); else if (r[t[0]] && e.isFunction(r[t[0]][0])) r[t[0]][0]();
        }
        e.each(n, function(e, t) {
            a(t.split(" "));
        });
    };
})(jQuery, document);