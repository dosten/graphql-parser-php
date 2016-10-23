#!/usr/bin/env sh

VERSION=$1
URL="https://github.com/graphql/libgraphqlparser/archive/${VERSION}.tar.gz"

echo "Downloading $URL"

curl -L $URL > /tmp/libgraphqlparser.tar.gz
tar zxvf /tmp/libgraphqlparser.tar.gz
rm -rf libgraphqlparser
mv libgraphqlparser-${VERSION} libgraphqlparser

echo "Use git status, add all files and commit changes."
