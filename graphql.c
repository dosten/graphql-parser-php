#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include <string.h>

#include "php.h"
#include "php_graphql.h"
#include "zend_exceptions.h"
#include "ext/json/php_json.h"
#include "ext/spl/spl_exceptions.h"
#include "graphqlparser/c/GraphQLAst.h"
#include "graphqlparser/c/GraphQLAstNode.h"
#include "graphqlparser/c/GraphQLParser.h"
#include "graphqlparser/c/GraphQLAstToJSON.h"

#ifndef PHP_JSON_PARSER_DEFAULT_DEPTH
#define PHP_JSON_PARSER_DEFAULT_DEPTH 512
#endif

zend_class_entry *graphql_parser_ce;
zend_class_entry *graphql_parse_error_ce;

ZEND_BEGIN_ARG_INFO_EX(arginfo_parse, 0, 0, 1)
ZEND_ARG_INFO(0, input)
ZEND_END_ARG_INFO()

zend_function_entry graphql_parser_ce_functions[] = {
	PHP_ME(Parser, parse, arginfo_parse, ZEND_ACC_PUBLIC)
	PHP_FE_END
};

PHP_METHOD(Parser, parse)
{
	struct GraphQLAstNode *ast;

	const char *input;
	int *input_len;

	const char *error;
	char *json;

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &input, &input_len) == FAILURE) {
		return;
	}

	ast = graphql_parse_string_with_experimental_schema_support(input, &error);

	if (ast == NULL) {
#if PHP_VERSION_ID < 50505
		zend_throw_exception(graphql_parse_error_ce, (char *) error, 0 TSRMLS_CC);
#else
		zend_throw_exception(graphql_parse_error_ce, error, 0 TSRMLS_CC);
#endif

		return graphql_error_free(error);
	}

	json = (char *) graphql_ast_to_json(ast);

#if PHP_MAJOR_VERSION < 7
	php_json_decode(return_value, json, strlen(json), 1, PHP_JSON_PARSER_DEFAULT_DEPTH TSRMLS_CC);
#else
	php_json_decode(return_value, json, strlen(json), 1, PHP_JSON_PARSER_DEFAULT_DEPTH);
#endif

	graphql_node_free(ast);
}

PHP_MINIT_FUNCTION(graphql)
{
	zend_class_entry tmp_graphql_parser_ce, tmp_graphql_parse_error_ce;

	INIT_NS_CLASS_ENTRY(tmp_graphql_parser_ce, "GraphQL", "Parser", graphql_parser_ce_functions);
	INIT_NS_CLASS_ENTRY(tmp_graphql_parse_error_ce, "GraphQL\\Error", "ParseError", NULL);

	graphql_parser_ce = zend_register_internal_class(&tmp_graphql_parser_ce TSRMLS_CC);

#if PHP_MAJOR_VERSION < 7
	graphql_parse_error_ce = zend_register_internal_class_ex(&tmp_graphql_parse_error_ce, spl_ce_RuntimeException, NULL TSRMLS_CC);
#else
	graphql_parse_error_ce = zend_register_internal_class_ex(&tmp_graphql_parse_error_ce, spl_ce_RuntimeException);
#endif

	return SUCCESS;
}

zend_module_entry graphql_module_entry = {
	STANDARD_MODULE_HEADER,
	"graphql",
	NULL,
	PHP_MINIT(graphql),
	NULL,
	NULL,
	NULL,
	NULL,
	GRAPHQL_VERSION,
	STANDARD_MODULE_PROPERTIES,
};

#ifdef COMPILE_DL_GRAPHQL
ZEND_GET_MODULE(graphql);
#endif
