PHP_ARG_ENABLE(graphql, whether to enable graphql support, [--enable-graphql  Enable graphql support])

if test "$PHP_GRAPHQL" != "no"; then
  PHP_REQUIRE_CXX()
  PHP_ADD_INCLUDE(/usr/local/include)

  LIBNAME=graphqlparser
  LIBSYMBOL=graphql_parse_string

  PHP_CHECK_LIBRARY($LIBNAME,$LIBSYMBOL,
  [
    PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, /usr/local/lib, GRAPHQL_SHARED_LIBADD)
    AC_DEFINE(HAVE_LIBGRAPHQLPARSER,1,[ ])
  ],[
    AC_MSG_ERROR([wrong libxyz lib version or lib not found])
  ],[
    -L/usr/local/lib -lm
  ])

  PHP_SUBST(GRAPHQL_SHARED_LIBADD)

  PHP_NEW_EXTENSION(graphql, graphql.c, $ext_shared)
fi
